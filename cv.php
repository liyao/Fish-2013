<?php
/**
 * Template Name: CV
 * Description: For CV presentation
 */
?>
<!DOCTYPE html>
<html>
<head>
<title>Li Yao's Resume</title>
<meta name="viewport" content="width=device-width"/>
<meta charset="UTF-8">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/cv.css">
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body id="cv_body">
<div id="wrapper">
	<section id="about_me" class="mod clearfix">
		<div class="mod_head">
			<h4>个人信息</h4>
		</div>
		<div class="mod_body">
			<div class="avatar">
				<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
			</div>
			<h1>厉 瑶</h1>
			<div class="personal_info">
				<span class="position">web前端工程师</span>
				<span>女</span>
				<span>1988.10</span>
				<span>天蝎座</span>
				<span>浙江大学硕士</span>
			</div>
			<section class="summary">
				2010年开始学习前端开发，接过外包，在几家创业公司做过前端实习生，
				热爱web前端开发，关注web标准、前端性能优化，以及前端代码规范，
				喜欢不断学习新技术不断尝试的激发状态。
				努力成为有理想有自我价值实现感的前端工程师，爱生活，爱前端，爱分享。
			</section>
		</div>
	</section>
		<section id="work_experience" class="mod clearfix">
		<i class="icon"></i>
		<div class="mod_head">
			<h4>工作经历</h4>
		</div>
		<div class="mod_body">
			<section class="projects clearfix">
				<div class="period">
					<span>03.2012</span>
					<span>06.2013</span>
				</div>
				<div class="project_content border-box">
					<div class="work_address">
						<span class="company">友谦网络科技有限公司</span>
						<i>浙江</i><i>杭州</i>
					</div>
					<h2 class="work_position">web前端开发工程师</h2>
					<ol class="work_detail">
						<li>负责公司通讯录类产品“查好友”的官网以及公司官网的页面开发，独立完成页面切图到网站上线的前端开发工作；</li>
						<li>负责“查好友”管理员网站的前端开发，与后台程序员合作完成网站的上线与维护;</li>
						<li>探索并解决网站的跨浏览器兼容性问题，包括（ie6+，FF，chrome, opera）。</li>
					</ol>
				</div>
			</section>
			<section class="projects clearfix">
				<div class="period">
					<span>09.2011</span>
					<span>03.2012</span>
				</div>
				<div class="project_content border-box">
					<div class="work_address">
						<span class="company">联合美妆国际有限公司</span>
						<i>浙江</i><i>杭州</i>
					</div>
					<h2 class="work_position">web前端开发工程师和UI设计</h2>
					<ol class="work_detail">
						<li>参与联合美妆售后管理系统的页面开发，负责UI界面设计和前端开发工作，与后台程序员远程合作完成系统开发上线;</li>
						<li>学会使用git提交代码并进行版本管理控制;对symfony框架有了一定了解;</li>
						<li>通过远程合作提高了与同伴沟通交流的能力与效率。</li>
					</ol>
				</div>
			</section>
			<section class="projects border-box">
				<div class="period">
					<span>09.2010</span>
					<span>09.2012</span>
				</div>
				<div class="project_content border-box">
					<div class="work_address">
						<span class="company">Elance.com</span>
						<i>浙江</i><i>杭州</i>
					</div>
					<h2 class="work_position">前端开发自由职业者</h2>
					<ol class="work_detail">
						<li>在外包平台<a target="_blank" href="https://www.elance.com">www.elance.com</a>上面接包，完成一些功能不是很复杂的项目;</li>
						<li>在中标直至项目交付的过程中，自己与客户沟通的能力以及对项目开发周期的时间点控制能力得以提高；</li>
						<li>与国外开发者的沟通与合作提高了自己的前端技术以及外语交流水平。</li>
					</ol>
				</div>
			</section>
		</div>
	</section>
	<section id="education" class="mod clearfix">
		<div class="mod_head">
			<h4>教育经历</h4>
			<h4>个人技能</h4>
		</div>
		<div class="mod_body clearfix">			
			<i class="icon"></i>
			<section class="education border-box">
				<section class="study_term">
					<div class="university">
						<span>浙江大学</span>
						<span>2011.09~2014.03</span>
					</div>
					<ul class="major">
						<li>主修：药物信息学</li>
						<li>自修：web前端开发</li>
						<li>学位：硕士</li>
					</ul>
				</section>
				<section class="study_term">
					<div class="university">
						<span>浙江大学</span>
						<span>2007.08~2011.06</span>
					</div>
					<ul class="major">
						<li>主修：药学</li>
						<li>辅修：创新与创业管理</li>
						<li>学位：本科</li>
					</ul>
				</section>
			</section>
			<section class="skill border-box">
				<i class="icon"></i>
				<ul class="skill_main">
					<li class="clearfix">
						<span class="skill_name">HTML</span>
						<div class="skill_level">
							<div class="level_bg">
								<div class="master_level level_4"></div>
							</div>
						</div>
					</li>
					<li class="clearfix">
						<span class="skill_name">HTML5</span>
						<div class="skill_level">
							<div class="level_bg">
								<div class="master_level level_4"></div>
							</div>
						</div>
					</li>
					<li class="clearfix">
						<span class="skill_name">CSS</span>
						<div class="skill_level">
							<div class="level_bg">
								<div class="master_level level_5"></div>
							</div>
						</div>
					</li>
					<li class="clearfix">
						<span class="skill_name">CSS3</span>
						<div class="skill_level">
							<div class="level_bg">
								<div class="master_level level_4"></div>
							</div>
						</div>
					</li>
					<li class="clearfix">
						<span class="skill_name">JavaScript</span>
						<div class="skill_level">
							<div class="level_bg">
								<div class="master_level level_3"></div>
							</div>
						</div>
					</li>
					<li class="clearfix">
						<span class="skill_name">jQuery</span>
						<div class="skill_level">
							<div class="level_bg">
								<div class="master_level level_4"></div>
							</div>
						</div>
					</li>
					<li class="clearfix">
						<span class="skill_name">PhotoShop</span>
						<div class="skill_level">
							<div class="level_bg">
								<div class="master_level level_3"></div>
							</div>
						</div>
					</li>
					<li class="clearfix">
						<span class="skill_name">PHP</span>
						<div class="skill_level">
							<div class="level_bg">
								<div class="master_level level_1"></div>
							</div>
						</div>
					</li>
					<li class="clearfix">
						<span class="skill_name">Ajax</span>
						<div class="skill_level">
							<div class="level_bg">
								<div class="master_level level_1"></div>
							</div>
						</div>
					</li>
				</ul>
			</section>
		</div>
	</section>
	<section id="contact" class="mod clearfix">
		<div class="mod_head">
			<h4>联系方式</h4>
			<h4>个人作品</h4>
		</div>
		<div class="mod_body">
			<section class="contact_me border-box">
				<ul>
					<li class="website"><span>个人网站</span><a target="_blank" href="http://www.liyao.name">www.liyao.name</a></li>
					<li class="mobile"><span>手机</span>+86 137 3817 3597</li>
					<li class="email"><span>邮箱</span><a target="_blank" href="mailto:love.liyao@gmail.com">love.liyao@gmail.com</a></li>
					<li class="weibo"><span>新浪微博</span><a target="_blank" href="http://weibo.com/lyrali">@玉面小飞鱼</a></li>
				</ul>
			</section>
			<section class="case_list border-box">
				<i class="icon"></i>
				<ul>
					<li><span>“查好友”官方网站</span><a target="_blank" href="http://www.chahaoyou.com/">www.chahaoyou.com</a></li>
					<li><span>“查好友”管理员网站</span><a target="_blank" href="http://admin.chahaoyou.com/login.php">www.admin.chahaoyou.com</a></li>
					<li><span>友谦网络科技有限公司</span><a target="_blank" href="http://friendest.cn/">www.friendest.cn</a></li>
					<li><span>思顿国际教育网站</span><a target="_blank" href="http://stone-edu.com/">www.stone-edu.com</a></li>
				</ul>
			</section>
			
		</div>
	</section>
</div>
</body>
</html>