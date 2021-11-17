<template>
    <div class="modal" id="addUser" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="text" placeholder="Name" v-model="name">
                    <input class="form-control" type="text" placeholder="Address" v-model="address">
                    <input class="form-control" min="10"  max="80" type="number" placeholder="Age" v-model="age">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click.prevent="addUser()">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AddUserModal",
    data() {
        return {
            age: 0,
            address: "",
            name: "",
            info: [],
        }
    },
    methods: {
        addUser() {
            this.info.name = this.name;
            this.info.address = this.address;
            this.info.age = this.age
            this.$emit('clickAddUser', this.info);
        },
    }


}


</script>

<style scoped>

</style>
