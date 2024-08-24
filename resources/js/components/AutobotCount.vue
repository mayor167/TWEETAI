<template>
    <div>
        <h1>Current Autobot Count: {{ count }}</h1>
    </div>
</template>

<script>
export default {
    data() {
        return {
            count: 0,
        };
    },
    mounted() {
        this.fetchAutobotCount();
        setInterval(this.fetchAutobotCount, 60000); 
    },
    methods: {
        async fetchAutobotCount() {
            try {
                const response = await fetch('http://localhost:8000/api/autobots/count');
                const data = await response.json();
                this.count = data.count;
            } catch (error) {
                console.error('Error fetching Autobot count:', error);
            }
        },
    },
};
</script>

<style scoped>

</style>
