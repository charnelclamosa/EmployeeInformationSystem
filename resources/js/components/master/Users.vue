<template>
<div class="normal-page">
    <div class="content">
        <div class="content-head">
            <div>
                <v-text-field dense placeholder="Search by name" v-model="searchData"></v-text-field>
            </div>
        </div>
        <div class="content-body">
            <v-data-table dense :headers="tableHead" :items="resultSearch" class="elevation-2">
                <template v-slot:[`item.status`]="{ item }">
                    <v-chip label outlined small :color="item.deleted_at ? 'error' : 'success'">{{item.deleted_at ? 'Deleted' : 'Active'}}</v-chip>
                </template>
                <template v-slot:[`item.actions`]="{ item }">
                    <v-icon small class="mr-2" @click="openUpdateUserDialog(item); $v.$reset();">
                        mdi-pencil
                    </v-icon>
                    <v-icon small @click="actionButton(item)">
                        {{ item.deleted_at ? 'mdi-restore' : 'mdi-delete' }}
                    </v-icon>
                </template>
            </v-data-table>
        </div>
        <div class="content-footer">
            <primary-button @click.native="newUserDialog = true; $v.$reset();" text="Add"></primary-button>
        </div>
    </div>
    <v-dialog persistent v-model="newUserDialog" width="400">
        <v-card tile>
            <v-card-title class="card-title">Create new user</v-card-title>
            <div class="dialog-content">
                <v-text-field class="mb-2" dense autofocus label="Name" v-model="newUser.name" :error-messages="newNameValidation" @blur="$v.newUser.name.$touch()"></v-text-field>
                <v-text-field class="mb-2" dense label="Username" v-model="newUser.username" :error-messages="newUsernameValidation" @blur="$v.newUser.username.$touch()"></v-text-field>
                <v-text-field class="mb-2" dense label="Password" v-model="newUser.password" :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'" :type="showPassword ? 'text' : 'password'" @click:append="showPassword = !showPassword" :error-messages="newPasswordValidation" @blur="$v.newUser.password.$touch()"></v-text-field>
                <v-select class="mb-2" dense label="Role" v-model="newUser.roleId" :items="roles" item-value="id" item-text="role_name" :error-messages="newRoleIdValidation" @blur="$v.newUser.roleId.$touch()"></v-select>
            </div>
            <div class="dialog-footer">
                <outline-button @click.native="newUserDialog = false" text="Cancel"></outline-button>
                <primary-button @click.native="createUser(newUser, userDetails.username)" text="Create" :disabled="btnLoader" :loading="btnLoader" class="ml-2"></primary-button>
            </div>
        </v-card>
    </v-dialog>
    <v-dialog persistent v-model="updateUserDialog" width="400">
        <v-card tile>
            <v-card-title class="card-title">Update user</v-card-title>
            <div class="dialog-content">
                <v-text-field class="mb-2" dense autofocus label="Name" v-model="updateUser.name" :error-messages="newNameValidation" @blur="$v.updateUser.name.$touch()"></v-text-field>
                <v-text-field class="mb-2" dense label="Username" v-model="updateUser.username" :error-messages="updateUsernameValidation" @blur="$v.updateUser.username.$touch()"></v-text-field>
                <v-text-field class="mb-2" dense label="Password" v-model="updateUser.password" :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'" :type="showPassword ? 'text' : 'password'" @click:append="showPassword = !showPassword"></v-text-field>
                <v-select class="mb-2" dense label="Role" v-model="updateUser.role_code" :items="roles" item-value="id" item-text="role_name"></v-select>
            </div>
            <div class="dialog-footer">
                <outline-button @click.native="updateUserDialog = false" text="Cancel"></outline-button>
                <primary-button @click.native="modifyUser(updateUser, userDetails.username); modifyUserPassword(updateUser, userDetails.username)" text="Update" :disabled="btnLoader" :loading="btnLoader" class="ml-2"></primary-button>
            </div>
        </v-card>
    </v-dialog>
</div>
</template>
<script>
import { required } from 'vuelidate/lib/validators';
export default {
    data() {
        return {
            userDetails: {},
            btnLoader: false,
            newUserDialog: false,
            updateUserDialog: false,
            tableHead: [
                {
                    text: 'Id',
                    value: 'sequence_id',
                    sortable: false
                },
                {
                    text: 'Name',
                    value: 'name',
                    sortable: false
                },
                {
                    text: 'Username',
                    value: 'username',
                    sortable: false
                },
                {
                    text: 'Role',
                    value: 'role_name',
                    sortable: false
                },
                {
                    text: 'Status',
                    value: 'status',
                    sortable: false
                },
                {
                    text: 'Actions',
                    value: 'actions',
                    sortable: false
                },
            ],
            users: [],
            roles: [],
            newUser: {},
            updateUser: {},
            showPassword: false,
            searchData: null
        }
    },
    validations: {
        newUser: { 
            name: { required },
            username: { required },
            password: { required },
            roleId: { required }
         },
        updateUser: { 
            name: { required },
            username: { required }
         }
    },
    computed: {
        newNameValidation() {
            const errors = [];
            if(!this.$v.newUser.name.$dirty) return errors;
            !this.$v.newUser.name.required && errors.push('This field is required');
            return errors;
        },
        newUsernameValidation() {
            const errors = [];
            if(!this.$v.newUser.username.$dirty) return errors;
            !this.$v.newUser.username.required && errors.push('This field is required');
            return errors;
        },
        newPasswordValidation() {
            const errors = [];
            if(!this.$v.newUser.password.$dirty) return errors;
            !this.$v.newUser.password.required && errors.push('This field is required');
            return errors;
        },
        newRoleIdValidation() {
            const errors = [];
            if(!this.$v.newUser.roleId.$dirty) return errors;
            !this.$v.newUser.roleId.required && errors.push('This field is required');
            return errors;
        },
        updateNameValidation() {
            const errors = [];
            if(!this.$v.updateUser.name.$dirty) return errors;
            !this.$v.updateUser.name.required && errors.push('This field is required');
            return errors;
        },
        updateUsernameValidation() {
            const errors = [];
            if(!this.$v.updateUser.username.$dirty) return errors;
            !this.$v.updateUser.username.required && errors.push('This field is required');
            return errors;
        },
        resultSearch() {
            if(!this.searchData) {
                return this.users;
            } else {
                return this.users.filter((item) => {
                return this.searchData.toLowerCase().split(' ').every(v => item.name.toLowerCase().includes(v));
            });
            }
            
        }
    },
    created() {
        this.getRoles();
        this.getUsers();
        this.getUserDetails();
    },
    methods: {
        getUserDetails() {
            this.userDetails = this.$store.getters.getUserData;
        },
        notification(type, text) {
            this.$notify({
                group: 'app',
                type: type,
                title: type == 'success' ? 'Success notification' : 'Error notification',
                text: text
            });
        },
        async getRoles() {
            try {
                this.$store.dispatch('showProgressBar');
                const response = await axios.get(`${this.$url}/api/roles`);
                this.roles = await response.data;
                this.$store.dispatch('hideProgressBar');
            } catch (error) {
                console.log(error);
                this.notification('error', 'Oops! Something went wrong.');
                this.$store.dispatch('hideProgressBar');
            }
        },
        async getUsers() {
            try {
                this.$store.dispatch('showProgressBar');
                const response = await axios.get(`${this.$url}/api/users`);
                for (let index = 0; index < response.data.length; index++) {
                    response.data[index].sequence_id = index + 1;
                }
                this.users = await response.data;
                this.$store.dispatch('hideProgressBar');
            } catch (error) {
                console.log(error);
                this.notification('error', 'Oops! Something went wrong.');
            }
            this.$store.dispatch('hideProgressBar');
        },
        actionButton(parameter) {
            let user = {};
            user = Object.assign({}, parameter);
            user.deleted_at ? this.restoreUser(user) : this.deleteUser(user);
        },
        openUpdateUserDialog(parameter) {
            this.updateUser = Object.assign({}, parameter);
            this.updateUserDialog = true;
        },
        async createUser(data, username) {
            this.$v.newUser.$touch();
            if(this.$v.newUser.$invalid) return;
            try {
                this.btnLoader = true;
                await axios.post(`${this.$url}/api/users`, {
                    user: data,
                    updatedBy: username
                });
                this.btnLoader = false;
                this.newUserDialog = false;
                this.notification('success', 'Data has been created.');
                this.newUser = {};
                this.getUsers();
            } catch (error) {
                console.log(error);
                this.btnLoader = false;
                this.notification('error', 'Oops! Something went wrong.');
            }
        },
        async modifyUser(data, username) {
            this.$v.updateUser.$touch();
            if(this.$v.updateUser.$invalid) return;
            try {
                this.btnLoader = true;
                await axios.put(`${this.$url}/api/users/` + data.id, {
                    user: data,
                    updatedBy: username
                });
                this.btnLoader = false;
                this.updateUserDialog = false;
                this.notification('success', 'Data has been updated.');
                this.updateUser = {};
                this.getUsers();
            } catch (error) {
                console.log(error);
                this.btnLoader = false;
                this.notification('error', 'Oops! Something went wrong.');
            }
        },
        async modifyUserPassword(parameter, username) {
            try {
                this.btnLoader = true;
                await axios.patch(`${this.$url}/api/users/password/` + parameter.id, {
                    newPassword: parameter.password,
                    updatedBy: username
                });
                this.btnLoader = false;
            } catch (error) {
                console.log(error);
                this.btnLoader = false;
                this.notification('error', 'Oops! Something went wrong.');
            }
        },
        async deleteUser(parameter) {
            try {
                this.$store.dispatch('showProgressBar');
                await axios.patch(`${this.$url}/api/users/delete/` + parameter.id);
                this.notification('success', 'Delete successful.');
                this.getUsers();
            } catch (error) {
                console.log(error);
                this.$store.dispatch('hideProgressBar');
                this.notification('error', 'Oops! Something went wrong.');
            }
        },
        async restoreUser(parameter) {
            try {
                this.$store.dispatch('showProgressBar');
                await axios.patch(`${this.$url}/api/users/restore/` + parameter.id);
                this.notification('success', 'Restore successful.');
                this.getUsers();
            } catch (error) {
                console.log(error);
                this.$store.dispatch('hideProgressBar');
                this.notification('error', 'Oops! Something went wrong.');
            }
        },
    }
}
</script>
<style scoped>
.dialog-content {
    display: flex;
    flex-direction: column;
    padding: 1rem 2rem;
}
.dialog-footer {
    display: flex;
    justify-content: flex-end;
    padding: 0 2rem 1rem 2rem;
}
.content-head {
    display: flex;
    justify-content: flex-end;
}
</style>