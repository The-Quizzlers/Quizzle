<template>
    <div class="p-4">
        <div v-if="!quizSubmitted">
            <input type="text" v-model="quizTitle" placeholder="Enter quiz title" class="w-full p-2 mb-4 border border-gray-300 rounded-md placeholder-gray-400" />
            <div class="mb-4">
                <button @click="assignCategory('Math')" :class="{'bg-blue-500 text-white': selectedCategory === 'Math'}" class="px-4 py-2 mr-2">Math</button>
                <button @click="assignCategory('Science')" :class="{'bg-blue-500 text-white': selectedCategory === 'Science'}" class="px-4 py-2 mr-2">Science</button>
                <button @click="assignCategory('History')" :class="{'bg-blue-500 text-white': selectedCategory === 'History'}" class="px-4 py-2 mr-2">History</button>
                <button @click="assignCategory('Geography')" :class="{'bg-blue-500 text-white': selectedCategory === 'Geography'}" class="px-4 py-2 mr-2">Geography</button>
                <button @click="assignCategory('Literature')" :class="{'bg-blue-500 text-white': selectedCategory === 'Literature'}" class="px-4 py-2">Literature</button>
            </div>
            <button @click="submitQuiz" class="px-4 py-2 bg-green-500 text-white rounded-md">Submit</button>
        </div>
        <div v-else>
            <button @click="selectElement('Choice')" class="px-4 py-2 bg-blue-500 text-white rounded-md mr-2" :disabled="isSubmitting">Choice</button>
            <button @click="selectElement('Truth')" class="px-4 py-2 bg-blue-500 text-white rounded-md mr-2" :disabled="isSubmitting">Truth</button>
            <button @click="selectElement('Typing')" class="px-4 py-2 bg-blue-500 text-white rounded-md mr-2" :disabled="isSubmitting">Typing</button>
            
            <div v-if="selectedElement === 'Choice'">
                <choice @question-submitted="handleQuestionSubmitted"></choice>
            </div>
            <div v-if="selectedElement === 'Truth'">
                <truth @question-submitted="handleQuestionSubmitted"></truth>
            </div>
            <div v-if="selectedElement === 'Typing'">
                <typing @question-submitted="handleQuestionSubmitted"></typing>
            </div>
            
            <div v-if="questionSubmitted">
                <button @click="addNextQuestion" class="px-4 py-2 bg-yellow-500 text-white rounded-md mr-2" :disabled="isSubmitting">Add Next Question</button>
                <button @click="finishQuiz" class="px-4 py-2 bg-red-500 text-white rounded-md" :disabled="isSubmitting">Finish Quiz</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Choice from '@/components/Choice.vue';
import Truth from '@/components/Truth.vue';
import Typing from '@/components/Typing.vue';

export default {
    components: {
        Choice,
        Truth,
        Typing
    },
    data() {
        return {
            quizTitle: '',
            selectedCategory: '',
            quizSubmitted: true,
            questions: [],
            selectedElement: '',
            questionSubmitted: false,
            isSubmitting: false
        };
    },
    methods: {
        removeQuestion(index) {
            this.questions.splice(index, 1);
        },
        assignCategory(category) {
            this.selectedCategory = category;
        },
        submitQuiz() {
            console.log('Quiz submitted:', this.quizTitle, this.selectedCategory, this.questions);
            const quizData = {
                title: this.quizTitle,
                category: this.selectedCategory,
                questions: this.questions
            };

            axios.post('http://127.0.0.1:8000/api/quiz/create', quizData)
                .then(response => {
                    console.log('Success:', response.data);
                    this.quizSubmitted = true;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        },
        selectElement(element) {
            this.selectedElement = element;
        },
        handleQuestionSubmitted(question) {
            this.isSubmitting = true;
            axios.post('http://127.0.0.1:8000/api/question/create', question)
                .then(response => {
                    console.log('Question submitted:', response.data);
                    this.questions.push(question);
                    this.questionSubmitted = true;
                    this.isSubmitting = false;
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.isSubmitting = false;
                });
        },
        addNextQuestion() {
            this.selectedElement = '';
            this.questionSubmitted = false;
        },
        finishQuiz() {
            this.submitQuiz();
        }
    }
};
</script>
