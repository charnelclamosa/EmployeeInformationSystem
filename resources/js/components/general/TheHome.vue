<template>
    <div id="dashboard">
        <div class="cards">
            <dashboard-card color="primary" icon="mdi-alpha-e-circle-outline" title="Employees" :value="totalEmployees"></dashboard-card>
            <dashboard-card color="primary" icon="mdi-alpha-e-circle-outline" title="Employees" :value="totalEmployees"></dashboard-card>
            <dashboard-card color="primary" icon="mdi-alpha-e-circle-outline" title="Employees" :value="totalEmployees"></dashboard-card>
            <dashboard-card color="primary" icon="mdi-alpha-e-circle-outline" title="Employees" :value="totalEmployees"></dashboard-card>
        </div>
    </div>
</template>
<script>
export default {
    data: () => {
        return {
            totalEmployees: 123,
        }
    }
}
</script>
<style scoped>
#dashboard {
    margin: 2rem 2rem 1rem 2rem;
}
.cards {
    display: flex;
}
.cards div:not(:last-child) {
    margin-right: 1.5rem;
}
.cards div {
    flex: auto;
}
</style>