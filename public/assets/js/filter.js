$(document).ready(function () {
    var projectTable = $("#projectTable").DataTable({
        ordering: false,
        searching: true,
    });
    var taskTable = $("#taskTable").DataTable({
        ordering: false,
        searching: true,
    });
    var usersTable = $("#usersTable").DataTable({
        ordering: false,
        searching: true,
    });

    var categoryIndex = 2;
    var projectIndex = 1;
    var statusIndex = 5;
    var userCategoryIndex = 5;
    var userStatusIndex = 6;

    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        if (
            settings.nTable.id !== "projectTable" &&
            settings.nTable.id !== "taskTable" &&
            settings.nTable.id !== "usersTable"
        ) {
            return true;
        }

        var selectedProject = $(".selectProject").val() || "";
        var selectedCategory = $(".selectCategory").val() || "";
        var selectStatus = $(".selectStatus").val() || "";
        var selectedUcategory = $(".selectUcategory").val() || "";
        var selectUserStatus = $(".selectUserStatus").val() || "";

        var task = data[projectIndex];
        var category = data[categoryIndex];
        var pstatus = data[statusIndex];
        var uCateogry = data[userCategoryIndex];
        var uStatus = data[userStatusIndex];

        if (
            (selectedCategory === "" || category.includes(selectedCategory)) &&
            (selectStatus === "" || pstatus.includes(selectStatus)) &&
            (selectedProject === "" || task.includes(selectedProject)) &&
            (selectedUcategory === "" ||
                uCateogry.includes(selectedUcategory)) &&
            (selectUserStatus === "" || uStatus.includes(selectUserStatus))
        ) {
            return true;
        }
        return false;
    });

    $(
        ".selectCategory, .selectStatus, .selectProject, .selectUcategory, .selectUserStatus"
    ).on("change", function () {
        projectTable.draw();
        taskTable.draw();
        usersTable.draw();
    });
});
