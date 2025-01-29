<template>
    <div class="flex justify-center items-center min-h-screen bg-gray-100 py-10 relative overflow-hidden">
        <div 
            class="w-36 h-36 bg-gray-400 rounded-2xl opacity-50 transform rotate-[random(10deg,50deg)] absolute -left-12 bottom-8" 
            style="transform: rotate(45deg);"
        ></div> 
        <div 
            class="w-36 h-36 bg-gray-400 rounded-full opacity-20 absolute top-8 left-8 transform -translate-x-1/2" 
            style="transform: rotate(35deg);"
        ></div>
        <div 
            class="w-32 h-32 bg-gray-400 rounded-2xl opacity-40 transform rotate-45 absolute top-16 right-0 translate-x-1/2"
            style="transform: rotate(23deg);"
        ></div>
        <div 
            class="w-40 h-40 bg-gray-400 rounded-2xl opacity-30 transform rotate-45 absolute bottom-8 right-8 translate-x-1/2" 
            style="transform: rotate(68deg);"
        ></div>

        <div class="bg-white p-6 rounded-xl shadow-md w-full max-w-sm relative">
            <h2 class="text-2xl font-semibold mb-4 text-center">Register</h2>
            <form @submit.prevent="register" class="flex flex-col">
                <p class="text-black text-xs text-center mb-3">
                    By continuing you agree to our 
                    <span class="font-bold underline cursor-pointer">
                        Community Guidelines
                    </span>
                </p>
                <div class="flex flex-col gap-3 mb-4">
                    <button 
                        type="button" 
                        class="w-full px-5 py-3 text-black text-xs bg-gray-200 rounded-full hover:bg-gray-300"
                    >
                        Sign in with Google
                    </button>
                    <button 
                        type="button" 
                        class="w-full px-5 py-3 text-black text-xs bg-gray-200 rounded-full hover:bg-gray-300"
                    >
                        Sign in with Apple
                    </button>
                    <button 
                        type="button" 
                        class="w-full px-5 py-3 text-black text-xs bg-gray-200 rounded-full hover:bg-gray-300"
                    >
                        Sign in with Facebook
                    </button>
                </div>
                <div class="flex items-center my-3">
                    <div class="flex-grow h-px bg-gray-300"></div>
                    <span class="px-2 text-gray-500 text-xs">or</span>
                    <div class="flex-grow h-px bg-gray-300"></div>
                </div>
                <label for="username" class="text-black mb-1 text-sm">Username</label>
                <input 
                    id="username" 
                    type="text" 
                    v-model="username" 
                    placeholder="george_droyd1488" 
                    required 
                    class="mb-3 p-2 text-xs border border-gray-300 rounded-md placeholder-gray-400"
                />
                <label for="email" class="text-black mb-1 text-sm">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    v-model="email" 
                    placeholder="example@gmail.com" 
                    required 
                    class="mb-3 p-2 text-xs border border-gray-300 rounded-md placeholder-gray-400"
                />
                <label for="password" class="text-black mb-1 text-sm">Password</label>
                <div class="relative mb-3">
                    <input 
                        id="password" 
                        :type="showPassword ? 'text' : 'password'" 
                        v-model="password" 
                        placeholder="At least 8 characters" 
                        required 
                        class="w-full p-2 text-xs border border-gray-300 rounded-md placeholder-gray-400 pr-10"
                    />
                    <span 
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-lg font-bold transition-all duration-200 hover:scale-110"
                        :class="showPassword ? 'text-black opacity-100' : 'text-gray-400 opacity-50'"
                        @click="showPassword = !showPassword"
                    >
                        👁️‍🗨️
                    </span>
                </div>
                <label for="confirmPassword" class="text-black mb-1 text-sm">Confirm Password</label>
                <div class="relative mb-3">
                    <input 
                        id="confirmPassword" 
                        :type="showConfirmPassword ? 'text' : 'password'" 
                        v-model="confirmPassword" 
                        placeholder="Repeat your password" 
                        required 
                        class="w-full p-2 text-xs border border-gray-300 rounded-md placeholder-gray-400 pr-10"
                    />
                    <span 
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-lg font-bold transition-all duration-200 hover:scale-110"
                        :class="showConfirmPassword ? 'text-black opacity-100' : 'text-gray-400 opacity-50'"
                        @click="showConfirmPassword = !showConfirmPassword"
                    >
                        👁️‍🗨️
                    </span>
                </div>
                <button 
                    type="submit" 
                    class="w-full px-3 py-2 text-white bg-[#8E94F2] rounded-full transition duration-300 hover:opacity-90 mb-2"
                >
                    Sign up
                </button>
                <button 
                    type="button" 
                    class="w-full px-3 py-2 text-black bg-[#BBADFF] rounded-full opacity-30 cursor-pointer"
                >
                    Log in instead
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            username: '',
            email: '',
            password: '',
            confirmPassword: '',
            showPassword: false,
            showConfirmPassword: false
        };
    },
    methods: {
        async register() {
            if (this.password !== this.confirmPassword) {
                alert("Passwords do not match!");
                return;
            }
            try {
                let token = axios.defaults.headers.common['X-CSRF-TOKEN']
        axios({
            method: "post",
            url: `http://localhost:8080/api/auth/register`,
            data: {
              username: this.username,
              email: this.email,
              password: this.password,
            },
            xsrfCookieName: "XSRF-TOKEN",
            xsrfHeaderName: "X-XSRF-TOKEN"
        }).then((response) => {
          console.log(response);
        });
            } catch (error) {
                console.error(error);
            }
        }
    }
};
</script>

<style scoped>
.shadow-md {
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}
</style>
