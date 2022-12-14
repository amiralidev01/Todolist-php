<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= SITE_TITLE ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
<!-- partial:index.partial.html -->
<div class="page">
    <div class="pageHeader">
        <div class="title">Dashboard</div>
        <div class="userPanel"><a href="../index.php?logout=1"><i class="fa fa-sign-out"></i></a><span
                    class="username"><?= getLoggedIndUser()->name ?? 'Unknown' ?> </span><img
                    src="../assets/images/avatar12.jpg" width="40"
                    height="40"/></div>
    </div>
    <div class="main">
        <div class="nav">
            <div class="searchbox">
                <div><i class="fa fa-search"></i>
                    <input type="search" placeholder="Search"/>
                </div>
            </div>
            <div class="menu">
                <div class="title">Folders</div>
                <ul class="folder-list">
                    <li class="<?= isset($_GET['folder_id']) ? '' : 'active'; ?>"><i class="fa fa-folder"></i><a
                                href="<?= site_url("") ?>">All<a/></li>

                    <?php /** @var TYPE_NAME $folders */
                    foreach ($folders as $folder) : ?>
                        <li class="<?= (isset($_GET['folder_id']) and $_GET['folder_id'] == $folder->id) ? 'active' : ''; ?>">
                            <a href="?folder_id=<?= $folder->id ?>"><i class="fa fa-folder"></i><?= $folder->name ?></a>
                            <a href="?delete_folder=<?= $folder->id ?>"
                               onclick="return confirm('Are you sure delete this folder?\n<?= $folder->name ?>')"
                               style="color: #f40000;"
                               class="fa fa-trash-o trash-btn"></a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>
            <div style="margin-top: 30px;">
                <input type="text"
                       style="  border: none;   height: 32px;   margin-left: 6px;   border-radius: 3px;   outline: none;"
                       id="addFolderInput"
                       placeholder="Add New Folder"/>
                <button type="submit"
                        id="addFolderBtn"
                        style=" border: none; background-color: green; color: white; height: 32px; border-radius: 2px; width: 43px; ">
                    +
                </button>
            </div>
        </div>
        <div class="view">
            <div class="viewHeader">
                <input type="text"
                       style="position: relative; bottom: 20px; padding: 12px; width: 40%; border: 1px solid #d5d5d5; border-radius: 3px; outline: none; "
                       name="" id="taskNameInput" placeholder="Type Press Enter For Add New Task...">
                <div class="functions">
                    <div class="button active">Add New Task</div>
                    <div class="button">Completed</div>
                    <div class="button inverz"><i class="fa fa-trash-o"></i></div>
                </div>
            </div>
            <div class="content">
                <div class="list">
                    <div class="title">Tasks</div>
                    <ul>
                        <?php foreach ($tasks as $task) : ?>
                            <li class="<?= $task->is_done ? 'checked' : ''; ?>">
                                <i data-taskID="<?= $task->id ?>"
                                   class="isDone clickable fa <?= $task->is_done ? 'fa-check-square-o' : 'fa-square-o'; ?>"></i>

                                <span><?= $task->title ?></span>

                                <div class="info" style="margin-right: 17px">

                                    <span style=>Created at : <?= $task->created_at ?></span>

                                    <a href="?delete_task=<?= $task->id ?>"
                                       onclick="return confirm('Are you sure delete this task?<?= $task->title ?>')"
                                       style="color: red;"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- partial -->
<!--<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../assets/js/script.js"></script>
<script>
    $(document).ready(function () {
        $('#addFolderBtn').click(function (e) {
            var input = $('input#addFolderInput');
            // alert(input.val());
            $.ajax({
                url: 'process/ajaxHandler.php',
                method: 'post',
                data: {action: "addFolder", FolderName: input.val()},
                success: function (response) {
                    if (response == '1') {
                        $('<li><a href="?folder_id="><i class="fa fa-folder"></i>' + input.val() + '</a></li>').appendTo('.folder-list');
                    } else {
                        alert(response);
                    }
                }
            });
        });

        $('#taskNameInput').on('keypress', function (e) {
            if (e.which == 13) {
                $.ajax({
                    url: 'process/ajaxHandler.php',
                    method: 'post',
                    data: {action: "addTask", FolderId: <?=$_GET['folder_id']?>, TaskTitle: $("#taskNameInput").val()},
                    success: function (response) {
                        if (response == '1') {
                            location.reload();
                        } else {
                            alert(response);
                        }
                    }
                });
            }
        });
        $('#taskNameInput').focus();


        $('.isDone').click(function (e) {
            var tid = $(this).attr('data-taskId');
            $.ajax({
                url: "process/ajaxHandler.php",
                method: "post",
                data: {action: "doneSwitch", taskId: tid},
                success: function (response) {
                    // alert(response);
                    location.reload();
                }
            });
        });
    });
</script>
</body>

</html>