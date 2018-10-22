function showNotification(text, classstatus) {
    let alerts = document.getElementById("alerts");

    let notification = document.createElement('div');
    alerts.appendChild(notification);
    notification.textContent = text;
    notification.classList.add("notification");
    notification.classList.add("show");
    notification.classList.add(classstatus);

    setTimeout(function() {
        notification.className = notification.className.replace("show", "");
    }, 3000);
}

function datetime() {
    let date = new Date();
    let year = date.getFullYear();
    let month = ('0'+ (date.getMonth() + 1)).slice(-2);
    let day = date.getDate();
    let hours = ('0'+ date.getHours()).slice(-2);
    let minutes = ('0'+ date.getMinutes()).slice(-2);
    let seconds = ('0'+ date.getSeconds()).slice(-2);
    return year +'-'+ month +'-'+ day +' '+ hours +':'+ minutes +':'+ seconds;
}

function listProjectvents() {
    $('.changenameproject').on('click', function() {
        let inputTitle = $(this).parent().parent().find('input[name="title-project"]');
        let inputId = $(this).parent().parent().find('input[name="id-project"]');
        $.ajax({
            url: 'api/projects/'+ inputId[0].value,
            data: {name: inputTitle[0].value},
            method: 'put',
            dataType: 'json',
            success: function() {
                $.pjax.reload({
                    container: '#list-projects'
                });
                showNotification('Project name changed with success', 'success');
            },
            error: function(error) {
                showNotification(error.statusText, 'danger');
            }
        });
    });

    $('.deleteproject').on('click', function() {
        $.ajax({
            url: 'api/projects/'+ this.value,
            method: 'delete',
            dataType: 'json',
            success: function() {
                $.pjax.reload({
                    container: '#list-projects'
                });
                showNotification('Project deleted with success', 'success');
            },
            error: function(error) {
                showNotification(error.statusText, 'danger');
            }
        });
    });

    $('.donetask').change(function() {
        $.ajax({
            url: 'api/tasks/'+ this.value,
            data: {done_at: datetime()},
            method: 'put',
            dataType: 'json',
            success: function() {
                $.pjax.reload({
                    container: '#list-projects'
                });
                showNotification('Task completed with success', 'success');
            },
            error: function(error) {
                showNotification(error.statusText, 'danger');
            }
        });
    });

    $('.deletetask').on('click', function() {
        $.ajax({
            url: 'api/tasks/'+ this.value,
            method: 'delete',
            dataType: 'json',
            success: function() {
                $.pjax.reload({
                    container: '#list-projects'
                });
                showNotification('Task deleted with success', 'success');
            },
            error: function(error) {
                showNotification(error.statusText, 'danger');
            }
        });
    });

    $('.addtask').on('click', function() {
        let form = $(this).closest('form');
        let inputDescription = form.find('input[name=\"task-description\"]');
        let inputProject = form.find('input[name=\"project-id\"]');

        $.ajax({
            url: 'api/tasks',
            data: {description: inputDescription[0].value, project_id: inputProject[0].value, created_at: datetime()},
            method: 'post',
            dataType: 'json',
            success: function() {
                inputDescription[0].value = '';
                $.pjax.reload({
                    container: '#list-projects'
                });
                showNotification('Task created with success', 'success');
            },
            error: function(error) {
                showNotification(error.statusText, 'danger');
            }
        });

        return false;
    });

    $('[data-toggle="tooltip"]').tooltip();
}

$('document').ready(function(){
    listProjectvents();

    $('#create-project > button[type=submit]').on('click', function() {
        let form = $(this).closest('form');
        let inputName = form.find('input[name=\"name-project\"]');
        let inputUser = form.find('input[name=\"user-id\"]');

        $.ajax({
            url: 'api/projects',
            data: {name: inputName[0].value, user_id: inputUser[0].value},
            method: 'post',
            dataType: 'json',
            success: function(success) {
                inputName[0].value = '';
                $.pjax.reload({
                    container: '#list-projects'
                });
                showNotification('Project created with success', 'success');
            },
            error: function(error) {
                showNotification(error.statusText, 'danger');
            }
        });

        return false;
    });
});

$(document).on('ready, pjax:end', function() {
    listProjectvents();
});