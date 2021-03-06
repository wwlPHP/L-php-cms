app.controller('registerCtrl', ['$scope', '$timeout', 'registerService', '$interval', function ($scope, $timeout, registerService, $interval) {

    $scope.registerStyle = true;
    $scope.registerBtnStatus = true;
    $scope.registerSuccess = false;
    $scope.registerFail = false;
    $scope.exist = false;
    $scope.countDown = 3;
    $scope.useEmail = function () {
        $scope.registerStyle = false;

    };
    $scope.usePhone = function () {
        $scope.registerStyle = true;

    };
    $scope.register = function () {
        $scope.registerSuccess = false;
        var account = '';
        var password = '';
        if ($scope.registerStyle) {
            account = $scope.phone;
            password = $scope.phonePassword;
        } else {
            account = $scope.email;
            password = $scope.emailPassword;
        }


        if ((account && password && $scope.registerForm.email.$valid && $scope.registerForm.emailPassword.$valid) || (account && password && $scope.registerForm.phone.$valid && $scope.registerForm.phonePassword.$valid)) {

            registerService.register($scope.registerStyle, account, password).then(function success(res) {
                if (res.data.code === 1) {
                    $scope.showSendEmail = true;

                    //发送邮件
                    registerService.sendRegisterEmail(account);


                }
            }, function error(res) {

            });
            $scope.registerBtnStatus = false;
        }


    };

    $scope.checkAccount = function () {
        var account = '';
        if ($scope.registerStyle) {
            account = $scope.phone;

        } else {
            account = $scope.email;

        }
        if ($scope.registerForm.email.$valid) {
            registerService.checkAccount($scope.registerStyle, account).then(function success(res) {
                if (res.data.code === 1) {
                    $scope.exist = false;
                } else {
                    $scope.exist = true;
                }
            }, function error(res) {

            });
        }

    };

    $scope.registerAfterSendEmail = function () {
        //   var _token=$('input[name="_token"]').eq(0).val();

        registerService.registerAfterSendEmail($scope.registerStyle, $scope.email, $scope.emailPassword, $scope.emailVerifyCode).then(function success(res) {
            if (res.data.code === 1) {
                $scope.showSendEmail = false;

                $scope.registerSuccess = true;
                $interval(function () {

                    $scope.countDown--;
                    if ($scope.countDown == 0) {
                        window.location.href = '/me';
                    }

                }, 1000);
            } else {
                $scope.registerFail = true;
            }
        }, function error(res) {

        });
    };


}]);

app.controller('loginCtrl', ['$scope', 'loginService', function ($scope, loginService) {
    $scope.loginMsg='';
    $scope.login = function () {
        loginService.login($scope.account, $scope.password).then(function success(res) {
            if (res.data.code === 1) {
                window.parent.location.href = '/';
            }else {
                $scope.loginMsg=res.data.msg;
            }
        }, function error(res) {

        });
    };

}]);

app.controller('headerCtrl', ['$scope', '$timeout', 'headerService', 'meService', function ($scope, $timeout, headerService, meService) {

    $scope.loginOut = function () {


        $('body').prepend('<div class="overlay overlay--dark" id="login_iframe"><button class="overlayclose-btn button--close" id="collection_close">×</button><iframe id="top_login_frame" src="/login" width="600" height="400" scrolling="no" class="top_fc_box"></iframe></div>');


        $('#collection_close').on('click', function () {
            $('#login_iframe').remove();

        });


    };

    $scope.getMenu = function () {
        headerService.getMenu().then(function success(res) {
                $scope.mouse = false;

                if (res.data.code === 1) {

                    for (var m = 0; m < res.data.topData.length; m++) {
                        res.data.topData[m].has_childen = false;
                        res.data.topData[m].childen = [];
                    }
                    for (var i = 0; i < res.data.topData.length; i++) {
                        for (var j = 0; j < res.data.data.length; j++) {
                            if (res.data.data[j].parent == res.data.topData[i].name) {
                                res.data.topData[i].has_childen = true;
                                res.data.topData[i].childen.push(res.data.data[j]);
                            }
                        }
                    }
                    $scope.topMenu = res.data.topData;

                }
            }, function error(res) {

            }
        );
    };
    $scope.mouseIsOver = false;
    $scope.mouseIsOver2 = false;
    $scope.setMouseIsOverFalse = function () {
        $timeout(function () {

            $scope.mouseIsOver = false;
        }, 1000);
    };
    $scope.setMouseIsOver2False = function () {
        $timeout(function () {

            $scope.mouseIsOver2 = false;
        }, 1000);
    };

    $scope.getUserInfo = function () {
        meService.getUserInfo().then(function success(res) {
            if (res.data.code === 1) {
                $scope.user = res.data.user;

            }
        }, function error(res) {

        });
    };
    $scope.logout = function () {

        headerService.logout().then(function success(res) {
            if (res.data.code === 1) {
                window.location.href = '/';

            }
        }, function error(res) {

        });
    };
    $scope.isLogin = function () {
        headerService.isLogin().then(function success(res) {
            if (res.data.code === 1) {
                $scope.logined = true;
                $scope.getUserInfo();
            } else {
                $scope.logined = false;
            }
        }, function error(res) {

        });
    };


}]);

app.controller('contentCtrl', ['$scope', '$timeout', function ($scope, $timeout) {
    $scope.collection = function () {

    };


}]);

app.controller('bannerCtrl', ['$scope', 'bannerService', function ($scope, bannerService) {
    $scope.getBanner = function () {
        bannerService.getBanner().then(function success(res) {
            if (res.data.code === 1) {
                $scope.mainBannerData = res.data.data;
                $scope.littleBannerData = res.data.littleSlider;
            }
        }, function error(res) {

        });
    };


}]);

app.controller('indexListCtrl', ['$scope', 'indexListService', function ($scope, indexListService) {
    $scope.getDocList = function () {
        indexListService.getDocList().then(function success(res) {
            if (res.data.code === 1) {
                $scope.indexDocList = res.data.data;

            }
        }, function error(res) {

        });
    };


}]);

app.controller('contentCtrl', ['$scope', 'contentService', '$sce', function ($scope, contentService, $sce) {
    $scope.getContent = function () {
        var id = $('#content_id').val();
        contentService.getContent(id).then(function success(res) {
            if (res.data.code === 1) {
                $scope.content = res.data.data;

            }
        }, function error(res) {

        });
    };


}]);

app.controller('authorBoardCtrl', ['$scope', 'authorBoardService', '$sce', function ($scope, authorBoardService, $sce) {
    $scope.getAuthor = function () {
        var id = $('#content_id').val();
        authorBoardService.getAuthor(id).then(function success(res) {
            if (res.data.code === 1) {
                $scope.content = res.data.data;

            }
        }, function error(res) {

        });
    };


}]);

app.controller('hotDocCtrl', ['$scope', 'hotDocService', function ($scope, hotDocService) {
    $scope.getHotDoc = function () {

        hotDocService.getHotDoc().then(function success(res) {
            if (res.data.code === 1) {
                $scope.hotList = res.data.data;

            }
        }, function error(res) {

        });
    };


}]);

app.controller('categoryCtrl', ['$scope', 'categoryService', function ($scope, categoryService) {
    $scope.name = $('.tagPage-header h1').html();

    $scope.getDocByCategory = function () {

        categoryService.getDocByCategory($scope.name).then(function success(res) {
            if (res.data.code === 1) {
                $scope.docByCategory = res.data.docByCategory.find_doc_by_category;

            }
        }, function error(res) {

        });
    };


}]);

app.controller('cateTagCtrl', ['$scope', 'cateTagService', function ($scope, cateTagService) {

    $scope.getTag = function () {
        cateTagService.getTag().then(function success(res) {
            if (res.data.code === 1) {
                $scope.tagData = res.data.tagData;

            }
        }, function error(res) {

        });
    };

}]);

app.controller('tagCtrl', ['$scope', 'tagService', function ($scope, tagService) {
    $scope.tag = $('#tag_location').html();
    $scope.getDocByTag = function () {
        tagService.getDocByTag($scope.tag).then(function success(res) {
            if (res.data.code === 1) {
                $scope.docByTag = res.data.docByTag;

            }
        }, function error(res) {

        });
    };

}]);

app.controller('cateHotDocCtrl', ['$scope', 'cateHotDocService', 'hotDocService', function ($scope, cateHotDocService, hotDocService) {
    $scope.cateGetHotDoc = function () {
        hotDocService.getHotDoc().then(function success(res) {
            if (res.data.code === 1) {
                $scope.hotList = res.data.data;

            }
        }, function error(res) {

        });
    }

}]);

app.controller('meCtrl', ['$scope', 'meService', function ($scope, meService) {
    $scope.getUserInfo = function () {
        meService.getUserInfo().then(function success(res) {
            if (res.data.code === 1) {
                $scope.user = res.data.user;

            }
        }, function error(res) {

        });
    }

}]);