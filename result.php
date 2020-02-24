<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trắc nghiệm tin học</title>

    <!-- Lấy thư viện css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="container">
        <div class="header-logo pull-left">
            <a href="#"><img src="images/logo.png" alt="logo" width="210px"></a>
        </div>
        <a id="touch-menu" class="mobile-menu" href="#">Menu</a>

        <nav class="header-menu pull-right">
            <ul class="menu">
                <li class="activate"><a href="#">Trang chủ</a></li>
                <li><a href="#">Thông tin</a></li>
                <li>
                    <a href="#">Khóa học</a>
                    <ul class="sub-menu">
                        <li><a href="#">Khóa học PHP</a></li>
                        <li><a href="#">Khóa học Java</a></li>
                        <li><a href="#">Trắc nghiệm</a>
                            <ul class="sub-sub-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Tin học</a></li>
                                <li><a href="#">Xem thêm</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">VIDEOS</a></li>
                <li><a href="#">Bài viết</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li class="hidden-xs"><a href="#"><span class="glyphicon glyphicon-search"
                                                        aria-hidden="true"></span></a></li>
            </ul>
        </nav>
    </div>
</header>
<section class="section-breadcrumb">
    <div class="container">
        <h3 class="title pull-left">Trắc nghiệm</h3>

        <ol class="breadcrumb pull-right">
            <li><a href="#">Trang chủ</a></li>
            <li class="active">Trắc nghiệm</li>
        </ol>
    </div>
</section>


<div id="main-content">
    <div class="container list-quiz">
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 no-padding-left">
			<?php
				require_once 'functions.php';
				if (empty($_POST))
					redirect('index.php');
				
				$arrQuestion = unserialize($_POST['array-data']);
				$xhtml       = '';
				if (!empty($arrQuestion)) {
					$i = 1;
					foreach ($arrQuestion as $key => $value) {
						$questionId = @$_POST['question-' . $value['id']];
						
						$option0 = showAnswerCheck('option-0', $questionId, $value['answer'], $value['option-0']);
						$option1 = showAnswerCheck('option-1', $questionId, $value['answer'], $value['option-1']);
						$option2 = showAnswerCheck('option-2', $questionId, $value['answer'], $value['option-2']);
						$option3 = showAnswerCheck('option-3', $questionId, $value['answer'], $value['option-3']);
						
						$xhtml .= '<div class="form-group">
                                    <p>' . $i . '. ' . $value['question'] . '</p>
                                    <div class="row">
                                    <div class="col-md-6">' . $option0 . $option1 . '</div>
                                    <div class="col-md-6">' . $option2 . $option3 . '</div>
                                    </div>
                                    </div>';
						$i++;
					}
				}
			?>

            <h1 class="page-header">Kết quả Trắc nghiệm trực tuyến</h1>
            <form action="#" method="post" name="test-form" id="test-form">
				<?php echo $xhtml; ?>
                <div class="form-group">
                    <a href="index.php" class="btn btn-primary">Làm lại</a>
                </div>
            </form>
			<?php
				$score = $_SESSION['score'];
			
			?>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Điểm của bạn</h3>
                </div>
                <div class="panel-body">
                    <h3 style="color: red;"><?php echo $score; ?>/10</h3>
                </div>
            </div>

        </div>


        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <!-- Widget Tags -->
            <div class="widget widget-tags">
                <h4>Bài viết mới nhất</h4>
                <ul class="widget-tags-list">
                    <li class="active"><a href="#">Bài viết</a></li>
                    <li><a href="#">Video lập trình</a></li>
                    <li><a href="#">Android</a></li>
                    <li><a href="#">Php</a></li>
                    <li><a href="#">NodeJs</a></li>
                    <li><a href="#">Java</a></li>
                    <li><a href="#">Thủ thuật lập trình</a></li>
                    <li><a href="#">Giao lưu</a></li>
                    <li><a href="#">Sách lập trình</a></li>
                    <li><a href="#">Nhóm </a></li>
                    <li><a href="#">Chia sẽ</a></li>
                </ul>
            </div>


            <!-- Widget Tags -->
            <div class="widget widget-tags">
                <h4>Thông tin nhanh</h4>
                <ul class="widget-tags-list">
                    <li class="active"><a href="#">Bài viết</a></li>
                    <li><a href="#">Video lập trình</a></li>
                    <li><a href="#">Android</a></li>
                    <li><a href="#">Php</a></li>
                    <li><a href="#">NodeJs</a></li>
                    <li><a href="#">Java</a></li>
                    <li><a href="#">Thủ thuật lập trình</a></li>
                    <li><a href="#">Giao lưu</a></li>
                    <li><a href="#">Sách lập trình</a></li>
                    <li><a href="#">Nhóm </a></li>
                    <li><a href="#">Chia sẽ</a></li>
                </ul>
            </div>


            <!-- Widget Ads -->
            <div class="widget widget-ads">
                <h4>Quảng cáo</h4>
                <ul class="widget-ads-list">
                    <li><a href="#"><img src="images/s1.jpg" alt="images"></a></li>
                    <li><a href="#"><img src="images/s2.jpg" alt="images"></a></li>
                    <li><a href="#"><img src="images/s3.jpg" alt="images"></a></li>
                    <li><a href="#"><img src="images/s4.jpg" alt="images"></a></li>
                    <li><a href="#"><img src="images/s5.jpg" alt="images"></a></li>
                    <li><a href="#"><img src="images/s6.jpg" alt="images"></a></li>
                </ul>
            </div>


        </div>
    </div>
</div>

<footer>
    <div class="footer-top">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 footer-column">
                <div class="widget-address">
                    <p class="logo">
                        <a href="#"><img src="images/logo.png" alt="logo" width="210px"/></a>
                    </p>
                    <p class="intro">
                        Hệ thống các bài trắc nghiệm thuộc khối tin học đại cương, tin học phổ thông (word, excel...)
                        giúp bàn luyện rèn thêm các kỹ năng tin học, trang 1.
                    </p>
                    <p>Phone:&nbsp;<span>0977547242</span></p>
                    <p>Email:&nbsp;<a href="mailto:namtruyenpro95@gmail.com">namtruyenpro95@gmail.com</a></p>
                </div>


            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 footer-column">
                <!-- Thông tin chung -->
                <div class="widget-list">
                    <h4>Liên hệ</h4>
                    <ul>
                        <li><a href="#">Nghệ An</a></li>
                        <li><a href="#">Quy định</a></li>
                        <li><a href="#">Hướng dẫn mua khóa học</a></li>
                        <li><a href="#">Hoàn trả ưu đãi học phí</a></li>
                        <li><a href="#">Chính sách bảo vệ thông tin khách hàng</a></li>
                        <li><a href="#">Thông tin về website</a></li>
                    </ul>
                </div>


            </div>
            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 footer-column">
                <!-- Thông tin hướng dẫn -->
                <div class="widget-list">
                    <h4>Thông tin chung</h4>
                    <ul>
                        <li><a href="#">Nghệ An</a></li>
                        <li><a href="#">Quy định</a></li>
                        <li><a href="#">Hướng dẫn mua khóa học</a></li>
                        <li><a href="#">Hoàn trả ưu đãi học phí</a></li>
                        <li><a href="#">Chính sách bảo vệ thông tin khách hàng</a></li>
                        <li><a href="#">Thông tin về website</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-column">
                <!-- Nhóm -->
                <div class="widget-blog">
                    <h4>Nhóm<span>Phát triển</span></h4>


                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object img-responsive" src="images/blog_pic1.jpg" alt="blog_pic1"/>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="#">namtruyenpro95@gmail.com</a>
                            </h4>
                            <span>10/05/2019</span>
                        </div>
                    </div>

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object img-responsive" src="images/blog_pic2.jpg" alt="blog_pic1"/>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="#">Quỳnh Hưng ,Quỳnh Lưu ,Nghệ An</a>
                            </h4>
                            <span>10/05/2019</span>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright pull-left">
            </div>

            <div class="social-icons pull-right ">
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>


<!--Lấy thư viện javascript-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/notify.js"></script>
<?php
	if ($score >=7) {
		?>
        <script type="text/javascript">
            $.notify("Chúc mừng bạn đã vượt qua bài thi này!", {
                className:'success',
                clickToHide: true,
                autoHide: true,
                arrowSize: 10,
                autoHideDelay: 5000,
                globalPosition: 'top center',
                showAnimation: 'slideDown',
                showDuration: 400,
                hideAnimation: 'slideUp',
                hideDuration: 200,
                gap: 4,
            });

        </script>
	<?php
		
		} else {
	
	?>
        <script type="text/javascript">
            $.notify("Bạn chưa đủ điểm để vượt qua bài thi này!", {
                className:'error',
                clickToHide: true,
                autoHide: true,
                autoHideDelay: 5000,
                globalPosition: 'top center',
                showAnimation: 'slideDown',
                showDuration: 400,
                hideAnimation: 'slideUp',
                hideDuration: 200,
                gap: 4
            });

        </script>
		
		<?php
		
	}
?>
<script type="text/javascript">
    $(document).ready(function () {
        $('input[type=radio]').change(function () {
            if ($('input[type=radio]:checked').length == 5) {
                $('button[type=submit]').removeAttr('disabled');
            }
        });
    });
</script>
</body>
</html>

