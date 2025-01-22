<template>
    <nav class="bg-[#D4C2FF] text-white p-4">
        <div class="flex items-center">
            <a class="mr-4 no-underline hover:underline" href="#">
                Quizzle
            </a>
            <ul class="flex items-center">
                <li class="mr-4">
                    <router-link to="/">Home</router-link>
                </li>
                <li class="mr-4">
                    <router-link to="/quiz">Quiz</router-link>
                </li>
                <li class="mr-4">
                    <router-link to="/profile">Profile</router-link>
                </li>
                <li class="mr-4">
                    <router-link to="/register">Register</router-link>
                </li>
                <li class="mr-4">
                    <router-link to="/login">Login</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'NavBar'
}
</script>