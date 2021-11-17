<template>
    <div class="container-fluid text-center">
        <div class="table-responsive col-12 text-center">
            <div class="alert alert-danger" role="alert" v-if="error.length > 0">
                {{error}}
            </div>
            <table class="table table-bordered table-hover">
                <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>
                        <span>
                            <a @click.prevent="deleteUser(user.id)" href="#" class="text-link">
                               <i class="bi bi-person-x"></i>
                            </a>
                        </span>
                        <a href="javascript:void(0)" @click.prevent="showUser(user)" data-toggle="tooltip" data-placement="right">{{user.name}}</a>
                        <span>
                            <a @click.prevent="updateUserPoint(user.id, 10)" href="#" class="text-link">
                               <i class="bi bi-plus-circle"></i>
                            </a>
                        </span>
                        <span>
                            <a @click.prevent="updateUserPoint(user.id, -10)" href="#" class="text-link">
                                <i class="bi bi-dash-circle"></i>
                            </a>
                        </span>
                        <span>
                            {{user.point}}
                        </span>
                    </td>
                </tr>
                <tr>
                  <span>
                      <a @click.prevent="addUser()" href="#" class="text-link">
                               + ADD USER
                      </a>
                  </span>
                </tr>
                </tbody>
            </table>
        </div>
        <div v-show="createNewUser">
        <form>
            <div class="form-group">
                <label for="formGroupExampleInput">Example label</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Another label</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
            </div>
        </form>
        </div>

        <add-user-modal
            @clickAddUser="clickAddUser"
        />
        <user-info-modal
          :currentUser="currentUser"
        />
    </div>
</template>

<script>
import {
    getAllUsers,
    deleteUser,
    updateUserPoint,
    createNewUser
} from './api';
import AddUserModal from './AddUserModal';
import VTooltip from 'v-tooltip'
import UserInfoModal from "./UserInfo";

export default {
    name: "LeaderBoard",
    components: {UserInfoModal, AddUserModal},
    data() {
        return {
            error: "",
            loading: false,
            users:[],
            createNewUser: false,
            checkUser:false,
            currentUser: Object(),
        }
    },
    created() {
        this.init();
    },
    mounted: function() {
        $('[data-toggle="tooltip"]').tooltip();
    },

    methods: {
        init() {
            getAllUsers().then(data => {
                this.users = data.data;
            }).catch(error => {
                this.error = "Error";
            });
        },
        deleteUser(id) {
            deleteUser(id).then(data => {
                this.users = data.data;
            }).catch(error => {
                this.error = "Error";
            });
        },
        addUser() {
            $('#addUser').modal({
                show: true,
                backdrop: 'static'
            });
        },
        clickAddUser(info) {
            createNewUser(info).then(data => {
                this.users = data.data;
            }).catch(error => {
                this.error = 'Error';
            }).finally(() => {
                $('#addUser').modal('hide');
            })
        },
        updateUserPoint(id, point) {
            updateUserPoint(id, point).then(data => {
                this.users = data.data;
            }).catch(error => {
                this.error = "Error";
            });
        },
        showUser(user) {
            this.currentUser = user;
            $('#userInfo').modal({
                show: true,
                backdrop: 'static'
            });
        }
    }
}
</script>

<style scoped>

</style>
