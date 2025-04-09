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
        <button @click="addQuestionsToParent" class="px-4 py-2 mt-4" :disabled="!isFormValid">Add Questions</button>
    </div>
</template>

<script>
export default {
    emits: ['questions-added'],
    data() {
        return {
            questions: [
                {
                    question: '',
                    correctAnswer: '',
                    type: 'truth'
                }
            ]
        };
    },
    computed: {
        isFormValid() {
            return this.questions.every(question => question.question !== '' && question.correctAnswer !== '');
        }
    },
    methods: {
        removeQuestion(index) {
            this.questions.splice(index, 1);
        },
        addQuestionsToParent() {
            console.log('Adding questions to parent:', this.questions);
            this.$emit('questions-added', this.questions);
            this.questions = [
                {
                    question: '',
                    correctAnswer: '',
                    type: 'truth'
                }
            ];
        }
    }
};
</script>
