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

            <div class="mb-4 flex items-center">
                <span class="mr-2">Public:</span>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" v-model="publicity" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-blue-600 peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800"></div>
                    <div class="absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition-transform peer-checked:translate-x-full"></div>
                </label>
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
                @questions-added="handleQuestionsAdded"
            />

        </div>

        <div v-if="questions.length > 0">
            <h3 class="mt-4 font-bold">Questions:</h3>
            <ul>
                <li 
                    v-for="(question, index) in questions" 
                    :key="index" 
                    class="mt-2 p-2 border border-gray-300 rounded-md">
                    {{ question.question }}
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
import Choice from '@/components/choice.vue';
import Truth from '@/components/truth.vue';
import Typing from '@/components/typing.vue';

export default {
    components: { Choice, Truth, Typing },
    data() {
        return {
            quizTitle: '',
            selectedCategory: '',
            quizSubmitted: false,
            choice: [],
            true_or_false: [],
            typing: [],
            questions: [],
            selectedElement: '',
            isSubmitting: false,
            categories: ['Math', 'Science', 'History', 'Geography', 'Literature'],
            elements: ['Choice', 'Truth', 'Typing'],
            user_id: 1,
            publicity: true
        };
    },
    computed: {
        selectedElementComponent() {
            return this.selectedElement ? this.selectedElement.toLowerCase() : null;
        }
    },
    methods: {
        async submitQuiz() {
            try {
                this.isSubmitting = true;
                const quizData = {
                    title: this.quizTitle,
                    category: this.selectedCategory,
                    public: this.publicity,
                    user_id: this.user_id,
                    choice: this.choice,
                    true_or_false: this.true_or_false,
                    typing: this.typing
                };
                await axios.post('http://127.0.0.1:8000/api/create/choice', quizData);
                this.quizSubmitted = true;
            } catch (error) {
                console.error('Error submitting quiz:', error);
            } finally {
                this.isSubmitting = false;
            }
        },
        handleQuestionsAdded(questions) {
            if (questions.length > 0) {
                const questionType = questions[0].type;
                if (questionType === 'choice') {
                    this.choice.push(...questions);
                } else if (questionType === 'truth') {
                    this.true_or_false.push(...questions);
                } else if (questionType === 'typing') {
                    this.typing.push(...questions);
                }
                this.questions.push(...questions);
            }
        }
    }
};
</script>
