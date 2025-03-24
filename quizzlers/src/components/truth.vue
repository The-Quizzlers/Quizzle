<template>
    <div class="p-4">
        <div v-for="(question, index) in questions" :key="index" class="mb-4">
            <input type="text" v-model="question.question" placeholder="Enter question" class="w-full p-2 mb-2 border border-gray-300 rounded-md placeholder-gray-400" />
            <div class="mb-2">
                <label>
                    <input type="radio" v-model="question.correctAnswer" value="true" />
                    True
                </label>
                <label>
                    <input type="radio" v-model="question.correctAnswer" value="false" />
                    False
                </label>
            </div>
            <button @click="removeQuestion(index)" class="px-4 py-2">Remove Question</button>
        </div>
        <button @click="$emit('submit')" class="px-4 py-2 mt-4 ">Submit Quiz</button>
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
        // submitQuiz() {
        //     console.log('Quiz submitted:', this.questions);
        //     const quizData = {
        //         questions: this.questions
        //     };
        //
        //     axios.post('http://127.0.0.1:8000/api/quiz/create', quizData)
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
