<template>
    
    <!--prerobit funkcie -->

    <div class="flex justify-center items-center min-h-screen bg-[gray-100] py-10">
        <div class="w-48 h-48 bg-gray-400 rounded-3xl mb-8 opacity-25 transform rotate-45 absolute -left-24"></div>
        <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
            <h2 class="text-3xl font-semibold mb-5 text-center">Register</h2>
            <form @submit.prevent="register" class="flex flex-col">
                <!-- Social Buttons -->
                <div class="flex flex-col gap-3 mb-5">
                    <button 
                        type="button" 
                        class="w-full px-4 py-2 text-black text-xs bg-gray-200 rounded-full hover:bg-gray-300"
                    >
                        Sign in with Google
                    </button>
                    <button 
                        type="button" 
                        class="w-full px-4 py-2 text-black text-xs bg-gray-200 rounded-full hover:bg-gray-300"
                    >
                        Sign in with Apple
                    </button>
                    <button 
                        type="button" 
                        class="w-full px-4 py-2 text-black text-xs bg-gray-200 rounded-full hover:bg-gray-300"
                    >
                        Sign in with Facebook
                    </button>
                </div>
                <!-- Divider -->
                <div class="flex items-center my-4">
                    <div class="flex-grow h-px bg-gray-300"></div>
                    <span class="px-3 text-gray-500 text-sm">or</span>
                    <div class="flex-grow h-px bg-gray-300"></div>
                </div>
                <!-- Input Fields -->
                <label for="email" class="text-black mb-1">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    v-model="email" 
                    placeholder="example@gmail.com" 
                    required 
                    class="mb-4 p-2 text-lg border border-gray-300 rounded-lg placeholder-gray-400" 
                />
                <label for="password" class="text-black mb-1">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    v-model="password" 
                    placeholder="at least 8 characters" 
                    required 
                    class="mb-4 p-2 text-lg border border-gray-300 rounded-lg placeholder-gray-400" 
                />
                <!-- Sign Up and Log In Buttons -->
                <button 
                    type="submit" 
                    class="w-full px-4 py-2 text-white bg-[#8E94F2] rounded-full transition duration-300 hover:opacity-90 mb-2"
                >
                    Sign up
                </button>
                <button 
                    type="button" 
                    class="w-full px-4 py-2 text-gray-500 bg-[#EBE7FF] rounded-full cursor-pointer"
                >
                    Log in instead
                </button>
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
/* Small, sharp drop shadow for the form container */
.shadow-md {
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}
</style>
