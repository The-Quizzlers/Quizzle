<template>
    <div class="p-4">
        <div v-for="(question, index) in questions" :key="index" class="mb-4">
            <input type="text" v-model="question.question" placeholder="Enter question" class="w-full p-2 mb-2 border border-gray-300 rounded-md placeholder-gray-400" />
            <div v-for="(option, optIndex) in question.options" :key="optIndex" class="mb-2">
                <input type="text" v-model="question.options[optIndex]" @input="addOption(index, optIndex)" placeholder="Enter option" class="w-full p-2 border border-gray-300 rounded-md placeholder-gray-400" />
            </div>
            <input type="text" v-model="question.correctAnswer" placeholder="Enter correct answer" class="w-full p-2 mb-2 border border-gray-300 rounded-md placeholder-gray-400" />
            <button @click="removeQuestion(index)" class="px-4 py-2">Remove Question</button>
        </div>
        <button @click="$emit('submit')" class="px-4 py-2 mt-4" :disabled="!isFormValid">Submit Quiz</button>
        <button @click="logFormValidity"> form check</button>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            questions: [
                {
                    question: '',
                    options: [''],
                    correctAnswer: ''
                }
            ]
        };
    },
    computed: {
        isFormValid() {
            return this.questions.every(question => {
                return question.question !== '' && question.correctAnswer !== '' && question.options.some(option => option !== '');    
            });
        }
    },
    watch: {
        questions: {
            handler() {
                console.log('Form validity:', this.isFormValid);
            },
            deep: true
        }
    },
    methods: {
        logFormValidity() {
            console.log('Form validity:', this.isFormValid);
        },
        removeQuestion(index) {
            this.questions.splice(index, 1);
        },
        addOption(questionIndex, optionIndex) {
            if (this.questions[questionIndex].options[optionIndex] !== '' && optionIndex === this.questions[questionIndex].options.length - 1) {
                this.questions[questionIndex].options.push('');
            }
        },
        // submitQuiz() {
        //     console.log('Quiz submitted:', this.questions);
        //     const quizData = {
        //         questions: this.questions
        //     };
        //
        //     axios.post('http://127.0.0.1:8000/api/quiz/create/choice', quizData)
        //     .then(response => {
        //         console.log('Success:', response.data);
        //     })
        //     .catch(error => {
        //         console.error('Error:', error);
        //     });
        // }
    }
};
</script>
