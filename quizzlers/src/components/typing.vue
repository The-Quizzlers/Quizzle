<template>
    <div class="p-4">
        <div v-for="(question, index) in questions" :key="index" class="mb-4">
            <input type="text" v-model="question.question" placeholder="Enter question" class="w-full p-2 mb-2 border border-gray-300 rounded-md placeholder-gray-400" />
            <div v-for="(option, optIndex) in question.options" :key="optIndex" class="mb-2">
                <input type="text" v-model="question.options[optIndex]" placeholder="Enter option" class="w-full p-2 border border-gray-300 rounded-md placeholder-gray-400" />
            </div>
            <input type="text" v-model="question.correctAnswer" placeholder="Enter correct answer" class="w-full p-2 mb-2 border border-gray-300 rounded-md placeholder-gray-400" />
            <button @click="removeQuestion(index)" class="px-4 py-2">Remove Question</button>
        </div>
        <button @click="submitQuiz" class="px-4 py-2 mt-4 ">Submit Quiz</button>
        <h1>typing lol</h1>
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
                    options: ['', '', '', ''],
                    correctAnswer: ''
                }
            ]
        };
    },
    methods: {
        addQuestion() {
            this.questions.push({
                question: '',
                options: ['', '', '', ''],
                correctAnswer: ''
            });
        },
        removeQuestion(index) {
            this.questions.splice(index, 1);
        },
        assignCategory(category) {
            this.selectedCategory = category;
        },
        submitQuiz() {
            console.log('Quiz submitted:', this.questions);
            const quizData = {
                questions: this.questions
            };

            axios.post('http://127.0.0.1:8000/api/quiz/create', quizData)
            .then(response => {
                console.log('Success:', response.data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
};
</script>
