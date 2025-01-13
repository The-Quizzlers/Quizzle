<template>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl mb-5 text-center">Register</h2>
            <form @submit.prevent="register" class="flex flex-col">
                <input type="text" v-model="username" placeholder="Username" required class="mb-4 p-2 text-lg border border-gray-300 rounded" />
                <input type="email" v-model="email" placeholder="Email" required class="mb-4 p-2 text-lg border border-gray-300 rounded" />
                <input type="password" v-model="password" placeholder="Password" required class="mb-4 p-2 text-lg border border-gray-300 rounded" />
                <input type="password" v-model="confirmPassword" placeholder="Confirm Password" required class="mb-4 p-2 text-lg border border-gray-300 rounded" />
                <button type="submit" class="p-3 text-lg cursor-pointer bg-blue-500 text-white rounded transition duration-300 hover:bg-green-600">Register</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            username: '',
            email: '',
            password: '',
            confirmPassword: ''
        };
    },
    methods: {
        register() {
            if (this.password !== this.confirmPassword) {
                alert("Passwords do not match!");
                return;
            }
            // Handle registration logic here
            console.log("User registered:", this.username, this.email);
        }
    }
};
</script>

<style scoped>
</style>
