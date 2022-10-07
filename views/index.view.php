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
        <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe </span><img
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
                                href="../index.php">All<a/></li>
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
                <div class="title">Manage Tasks</div>
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
                                <i class="fa <?= $task->is_done ? 'fa-check-square-o' : 'fa-square-o'; ?>"></i>

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
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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
    });
</script>
</body>

</html>