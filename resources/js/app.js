import "./bootstrap";
import "../sass/app.scss";

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(window).on("load", function () {
    const wrapper = $("#wrapper");
    const uploadImage = wrapper.find(".form-control.aside-form-file");
    const menu = wrapper.find(".header-container");
    const listAuthNames = wrapper.find(".blogpost-card-authorCustom");
    const aside = wrapper.find(".aside");
    const detail = wrapper.find(".detail");
    menu.toggleClass("sticky-active");

    if (aside.length || detail.length) {
        $(".header").addClass("header-session");
    }

    if (uploadImage.length) {
        uploadImage.on("change", function (evt) {
            const file = evt.target.files[0];
            if (file) {
                const allowedTypes = [
                    "image/jpeg",
                    "image/png",
                    "image/gif",
                    "image/svg+xml",
                ];
                if (!allowedTypes.includes(file.type)) {
                    $("#photo").attr("src", "/images/default-image.jpg");
                    return;
                }
                $("#photo").attr("src", URL.createObjectURL(file));
            }
        });
    }

    if (listAuthNames.length) {
        listAuthNames.each(function () {
            let text = $(this).text().trim();
            if (text.length > 10) {
                text = text.substring(0, 10) + "...";
                $(this).text(text);
            }
        });
    }
});

$(window).scroll(function () {
    const wrapper = $("#wrapper");
    const menu = wrapper.find(".header-container");
    const screen = $(window).scrollTop();

    if (screen <= 120) {
        menu.removeClass("sticky");
        menu.addClass("sticky-active");
    } else {
        menu.removeClass("sticky-active");
        menu.removeClass("sticky");
        setTimeout(function () {
            menu.addClass("sticky");
        }, 300);
    }
});

$("#comment").click(() => {
    let blogId = $("#comment").attr("data-id");
    let url = $("#comment").attr("data-url");
    let contentComment = $("#content-comment").val();
    let token = $(this).data("token");
    if (contentComment.trim() !== "") {
        $.ajax({
            url: url,
            type: "POST",
            data: {
                blogId,
                contentComment,
                token,
            },
            dataType: "json",
            success: function (data) {
                $(".detail-comment-list").prepend(data);
                $("#content-comment").val("");
            },
        });
    }
});

$(".modalDelete").click(() => {
    $(".deleteConfirmation").modal("toggle");
});

$(".detail-heart").click(() => {
    let url = $(".detail-heart-btn").attr("data-url");
    let blogId = $(".detail-heart-btn").attr("data-id");
    let token = $(this).data("token");

    $.ajax({
        url: url,
        type: "POST",
        data: {
            blogId,
            token,
        },
        dataType: "json",
        success: function (data) {
            $(".detail-numberHeart").remove();
            $(".detail-heart-btn").remove();
            $(".detail-heart").append(data);
        },
    });
});

$(document).ready(function () {
    $("#slideDetail").carousel();

    $("#slideDetail").carousel({
        touch: true,
        interval: 500,
    });
});

$(".header-menu-search").click((e) => {
    e.stopPropagation();
    $(".header-menu-icon-btn").hide();
    $(".header-menu-logo").hide();
    $(".header-logo-name-menu").hide();
    $(".header-menu-search").hide();
    $(".header-nav-search").show();
});

$(".header-menu-nav").click((e) => {
    e.stopPropagation();
});

if (window.matchMedia("(max-width: 769px)").matches) {
    $("#wrapper").click(() => {
        $(".header-menu-icon-btn").show();
        $(".header-menu-logo").show();
        $(".header-logo-name-menu").show();
        $(".header-menu-search").show();
        $(".header-nav-search").hide();
    });
}

$(".table-delete-user").each(function () {
    $(this).click(function () {
        const url = $(this).attr("data-url");
        const id = $(this).attr("data-id");
        let token = $(this).data("token");

        $(".table-delete-userbtn").click(function () {
            $.ajax({
                url,
                type: "DELETE",
            });
            $(`.table-user-row-${id}`).remove();
            $(".deleteConfirmation").modal("hide");
        });
    });
});

$(".avatar-user-file").on("change", function (evt) {
    const file = evt.target.files[0];
    if (file) {
        const allowedTypes = [
            "image/jpeg",
            "image/png",
            "image/gif",
            "image/svg+xml",
        ];
        if (!allowedTypes.includes(file.type)) {
            $(".avatar-image-edit").attr("src", "/images/default-image.jpg");
            return;
        }
        $(".avatar-image-edit").attr("src", URL.createObjectURL(file));
    }
});
