<template>
    <div class="p-4">
        <div v-if="!quizSubmitted">
            <input 
                type="text" 
                v-model="quizTitle" 
                placeholder="Enter quiz title" 
                class="w-full p-2 mb-4 border border-gray-300 rounded-md placeholder-gray-400" 
            />

            <div class="mb-4">
                <button 
                    v-for="category in categories" 
                    :key="category" 
                    @click="selectedCategory = category" 
                    :class="{ 'bg-blue-500 text-white': selectedCategory === category }" 
                    class="px-4 py-2 mr-2">
                    {{ category }}
                </button>
            </div>
        </div>
        
        <div>
            <button 
                v-for="element in elements" 
                :key="element" 
                @click="selectedElement = element" 
                class="px-4 py-2 bg-blue-500 text-white rounded-md mr-2" 
                :disabled="isSubmitting">
                {{ element }}
            </button>

            <component 
                :is="selectedElementComponent" 
            />

            <div v-if="currentQuestion">
                <button 
                    @click="addQuestion" 
                    class="px-4 py-2 bg-green-500 text-white rounded-md mr-2" 
                    :disabled="!isQuestionComplete || isSubmitting">
                    Add Question
                </button>
                <button 
                    @click="resetQuestion" 
                    class="px-4 py-2 bg-yellow-500 text-white rounded-md mr-2" 
                    :disabled="isSubmitting">
                    Create New Question
                </button>
            </div>
        </div>

        <div v-if="questions.length > 0">
            <h3 class="mt-4 font-bold">Questions:</h3>
            <ul>
                <li 
                    v-for="(question, index) in questions" 
                    :key="index" 
                    class="mt-2 p-2 border border-gray-300 rounded-md">
                    {{ question.text }}
                </li>
            </ul>
            <button 
                @click="submitQuiz" 
                class="px-4 py-2 bg-red-500 text-white rounded-md mt-4" 
                :disabled="isSubmitting">
                Submit Quiz
            </button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Choice from '@/components/Choice.vue';
import Truth from '@/components/Truth.vue';
import Typing from '@/components/Typing.vue';

export default {
    components: { Choice, Truth, Typing },
    data() {
        return {
            quizTitle: '',
            selectedCategory: '',
            quizSubmitted: false,
            questions: [],
            selectedElement: '',
            currentQuestion: null,
            isSubmitting: false,
            categories: ['Math', 'Science', 'History', 'Geography', 'Literature'],
            elements: ['Choice', 'Truth', 'Typing']
        };
    },
    computed: {
        selectedElementComponent() {
            return this.selectedElement ? this.selectedElement.toLowerCase() : null;
        },
        isQuestionComplete() {
            return this.currentQuestion && this.currentQuestion.text && this.currentQuestion.options;
        }
    },
    methods: {
        async submitQuiz() {
            try {
                this.isSubmitting = true;
                const quizData = {
                    title: this.quizTitle,
                    category: this.selectedCategory,
                    questions: this.questions
                };
                await axios.post('http://127.0.0.1:8000/api/create/choice', quizData);
                this.quizSubmitted = true;
            } catch (error) {
                console.error('Error submitting quiz:', error);
            } finally {
                this.isSubmitting = false;
            }
        },
        handleQuestionSubmitted(question) {

        },
        addQuestion() {
            if (this.isQuestionComplete) {
                this.questions.push(this.currentQuestion);
                this.currentQuestion = null;
                this.selectedElement = '';
            }
        },
        resetQuestion() {
            this.selectedElement = '';
            this.currentQuestion = null;
        }
    }
};
</script>
