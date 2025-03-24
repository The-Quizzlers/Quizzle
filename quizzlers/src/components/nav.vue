<template>
    <nav>
        <div class="bg-white text-black p-4 flex justify-between">
            <img src="../icons/logo.svg" alt="logo">
            <div class="flex items-center space-x-8 mx-auto">

            <a class="text-black no-underline hover:underline" href="#">
                Create
            </a>
            <a class="text-black no-underline hover:underline" href="#">
                Forums
            </a>
            <a class="text-black no-underline hover:underline" href="#">
                Random Quiz
            </a>
            <button class="">
                <router-link to="/creation">create quizz</router-link>
            </button>
            </div>
            <div class="flex items-center space-x-4">
                <button class="border border-[#9FA0FF] text-[#6768BF] no-underline hover:underline px-4 py-2 rounded-full">
                    <router-link to="/login">Log in</router-link>
                </button>      
                <button class="border border-[#9FA0FF] text-[#6768BF] no-underline hover:underline px-4 py-2 rounded-full">
                    <router-link to="/register">Register</router-link>
                </button>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'NavBar'
}
</script>
