<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle Clone</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>frontend/css/navbar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>frontend/css/footer.css">
</head>
<body>
    <!-- Top blue bar -->
    <div class="navbar-topbar">
        <div class="navbar-topbar-content">
            <span class="navbar-topbar-icon navbar-search" title="Search">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </span>
            <span class="navbar-topbar-lang">EN <svg width="12" height="12" viewBox="0 0 20 20" fill="none" stroke="#fff" stroke-width="2"><polyline points="5 8 10 13 15 8"></polyline></svg></span>
            <span class="navbar-topbar-divider"></span>
            <span class="navbar-topbar-icon navbar-menu" title="Menu">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <g>
                        <circle cx="4" cy="4" r="1.5"/>
                        <circle cx="12" cy="4" r="1.5"/>
                        <circle cx="20" cy="4" r="1.5"/>
                        <circle cx="4" cy="12" r="1.5"/>
                        <circle cx="12" cy="12" r="1.5"/>
                        <circle cx="20" cy="12" r="1.5"/>
                        <circle cx="4" cy="20" r="1.5"/>
                        <circle cx="12" cy="20" r="1.5"/>
                        <circle cx="20" cy="20" r="1.5"/>
                    </g>
                </svg>
            </span>
            <span class="navbar-topbar-icon navbar-user" title="User">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M2 20c0-4 8-6 10-6s10 2 10 6"/></svg>
            </span>
        </div>
    </div>
    <!-- Main navbar -->
    <nav class="navbar">
        <div class="navbar-inner">
        <a href="/moodle-clone/" class="navbar-logo">
                <img src="https://moodle.com/wp-content/uploads/2024/02/Moodlelogo.svg" alt="">
        </a>
        <div class="navbar-links">
                <div class="navbar-dropdown-parent">
            <a href="#">Solutions <svg width="14" height="14" viewBox="0 0 20 20" fill="none" stroke="#18445b" stroke-width="2"><polyline points="5 8 10 13 15 8"></polyline></svg></a>
                    <div class="navbar-dropdown solutions-dropdown">
                        <div class="dropdown-col">
                            <div class="dropdown-heading">Industries</div>
                            <ul>
                                <li><span class="dropdown-bullet"></span> Higher Education</li>
                                <li><span class="dropdown-bullet"></span> Workplace Learning</li>
                                <li><span class="dropdown-bullet"></span> Government</li>
                                <li><span class="dropdown-bullet"></span> Vocational Training</li>
                                <li><span class="dropdown-bullet"></span> K-12</li>
                            </ul>
                        </div>
                        <div class="dropdown-col">
                            <div class="dropdown-heading">Use Cases</div>
                            <ul>
                                <li><span class="dropdown-bullet"></span> Compliance Training</li>
                                <li><span class="dropdown-bullet"></span> Customer Training</li>
                                <li><span class="dropdown-bullet"></span> Employee Development</li>
                                <li><span class="dropdown-bullet"></span> Employee Onboarding</li>
                                <li><span class="dropdown-bullet"></span> Partner Enablement</li>
                                <li><span class="dropdown-bullet"></span> Sales Enablement</li>
                            </ul>
                        </div>
                    </div>
                </div>
            <a href="#">Services <svg width="14" height="14" viewBox="0 0 20 20" fill="none" stroke="#18445b" stroke-width="2"><polyline points="5 8 10 13 15 8"></polyline></svg></a>
            <a href="#">Products <svg width="14" height="14" viewBox="0 0 20 20" fill="none" stroke="#18445b" stroke-width="2"><polyline points="5 8 10 13 15 8"></polyline></svg></a>
                <div class="navbar-dropdown-parent">
            <a href="#">About Us <svg width="14" height="14" viewBox="0 0 20 20" fill="none" stroke="#18445b" stroke-width="2"><polyline points="5 8 10 13 15 8"></polyline></svg></a>
                    <div class="navbar-dropdown aboutus-dropdown">
                        <div class="dropdown-col">
                            <div class="dropdown-heading">About Us</div>
                            <ul>
                                <li class="aboutus-trigger">
                                    <a href="<?= BASE_URL ?>about_us.php"><span class="dropdown-bullet"></span> About Us</a>
                                </li>
                                <li><a href="<?= BASE_URL ?>event.php"><span class="dropdown-bullet"></span> Events</a></li>
                                <li><span class="dropdown-bullet"></span> Community</li>
                                <li><span class="dropdown-bullet"></span> Careers</li>
                                <li><span class="dropdown-bullet"></span> Awards</li>
                            </ul>
                        </div>
                        <div class="dropdown-col more-aboutus">
                            <div class="dropdown-heading">More About Us</div>
                            <ul>
                                <li><span class="dropdown-bullet"></span> The Moodle Story</li>
                                <li><span class="dropdown-bullet"></span> Open Source</li>
                                <li><span class="dropdown-bullet"></span> Moodle's AI Principles</li>
                                <li><span class="dropdown-bullet"></span> Official Certified B Corporation</li>
                                <li><span class="dropdown-bullet"></span> Our Leadership Team</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="navbar-dropdown-parent">
            <a href="#">Resources <svg width="14" height="14" viewBox="0 0 20 20" fill="none" stroke="#18445b" stroke-width="2"><polyline points="5 8 10 13 15 8"></polyline></svg></a>
                    <div class="navbar-dropdown resources-dropdown">
                        <div class="dropdown-col resources-info">
                            <div class="dropdown-heading resources-heading">Resources</div>
                            <div class="resources-desc">
                                Find news and resources about Moodle products, solutions, services, releases, case studies, and more.
                            </div>
                            <a href="<?= BASE_URL ?>news.php" class="resources-btn">View All News <span class="arrow">→</span></a>
                        </div>
                        <div class="dropdown-col resources-news">
                            <ul>
                                <li>
                                    <img src="https://moodle.com/wp-content/uploads/2024/05/moot-session.jpg" alt="Moot session" class="news-img"/>
                                    <span class="news-title">What makes a great Moot session? Tips from past presenters</span>
                                </li>
                                <li>
                                    <img src="https://moodle.com/wp-content/uploads/2024/05/moot-global.jpg" alt="MoodleMoot Global" class="news-img"/>
                                    <span class="news-title">5 reasons you can't miss MoodleMoot Global 2025</span>
                                </li>
                                <li>
                                    <img src="https://moodle.com/wp-content/uploads/2024/05/gess-saudi.jpg" alt="GESS Saudi Arabia" class="news-img"/>
                                    <span class="news-title">Moodle takes off for GESS Saudi Arabia 2025: Meet us in Riyadh</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
        <div class="navbar-actions">
            <a href="#" class="navbar-getmoodle">Get Moodle</a>
            <a href="#" class="navbar-contact">Contact Us</a>
            </div>
        </div>
    </nav>



    <!-- Content -->
    <main class="flex-1 w-full">
            <?php echo $content ?? ''; ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-main">
            <div class="footer-branding">
                <div class="footer-logo">
                    <img src="https://moodle.com/wp-content/uploads/2022/02/logo-footer.svg" alt="Moodle Logo" height="40"/>
                </div>
                <div class="footer-logo-separator"></div>
                <div class="footer-bcorp">
                    <img src="https://moodle.com/wp-content/uploads/2022/02/b-corp-footer.png" alt="B Corp Certified" height="40"/>
                </div>
            </div>
            <div class="footer-columns">
                <div class="footer-col">
                    <h4>Solutions</h4>
                    <ul>
                        <li>Industries</li>
                        <li class="footer-sub">Higher Education</li>
                        <li class="footer-sub">Workplace Learning</li>
                        <li class="footer-sub">Government</li>
                        <li class="footer-sub">Vocational Training</li>
                        <li class="footer-sub">K-12</li>
                        <li>Use Cases</li>
                        <li class="footer-sub">Compliance Training</li>
                        <li class="footer-sub">Customer Training</li>
                        <li class="footer-sub">Employee Development</li>
                        <li class="footer-sub">Employee Onboarding</li>
                        <li class="footer-sub">Partner Enablement</li>
                        <li class="footer-sub">Sales Enablement</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Services</h4>
                    <ul>
                        <li>Certified Partners & Service Providers</li>
                        <li class="footer-sub">Find your Partner</li>
                        <li class="footer-sub">Become a Moodle Partner</li>
                        <li>Hosting</li>
                        <li>Customisation & Development</li>
                        <li>Learning Design</li>
                        <li>Support & Training</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Products</h4>
                    <ul>
                        <li>Moodle LMS</li>
                        <li>Certified Integrations</li>
                        <li class="footer-sub">Become a Certified Integration Partner</li>
                        <li>Moodle App</li>
                        <li>Moodle Workplace</li>
                        <li>Moodle App</li>
                        <li>MoodleCloud</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>About Us</h4>
                    <ul>
                        <li>About Us</li>
                        <li class="footer-sub">The Moodle Story</li>
                        <li class="footer-sub">Open Source</li>
                        <li class="footer-sub">Moodle's AI Principles</li>
                        <li class="footer-sub">Official Certified B Corporation</li>
                        <li>Events</li>
                        <li>Careers</li>
                        <li>Awards</li>
                        <li>Accessibility</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-row">
                <div class="footer-bottom-left">Empowering educators to improve our world.</div>
                <div class="footer-bottom-center">
                    <a href="#">Donate <span class="footer-arrow">→</span></a>
                    <a href="#">Shop <span class="footer-arrow">→</span></a>
                    <a href="#">Newsletter sign up <span class="footer-arrow">→</span></a>
                </div>
            </div>
            <div class="footer-bottom-row socials-and-links">
                <div class="footer-bottom-links">
                    <a href="#">Cookies Policy</a>
                    <a href="#">Privacy Notice</a>
                    <a href="#">Trademark Policy</a>
                </div>
                <div class="footer-bottom-right footer-socials">
                    <span>Follow us:</span>
                    <a class="facebook social-icon" href="https://www.facebook.com/moodle/" aria-label="Go to Facebook (external link, opens in a new tab)" rel="noopener"><svg fill="none" height="20" viewBox="0 0 20 20" width="100%" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m0 4.00098c0-1.06087.421427-2.07829 1.17157-2.82843.75015-.750146 1.76756-1.17157344 2.82843-1.17157344h12c1.0609 0 2.0783.42142744 2.8284 1.17157344.7502.7501.7501 1.76756 1.1716 2.82843v12.00002c0 1.0608-.4214 2.0783-1.1716 2.8284-.7501.7501-1.7675 1.1716-2.8284 1.1716h-12c-1.06087 0-2.07828-.4215-2.82843-1.1716-.750143-.7501-1.17157-1.7676-1.17157-2.8284zm4-2c-.53043 0-1.03914.21071-1.41421.58578-.37508.37508-.58579.88378-.58579 1.41422v12.00002c0 .5304.21071 1.0391.58579 1.4142.37507.3751.88378.5858 1.41421.5858h6v-7h-1c-.26522 0-.51957-.1054-.70711-.2929-.18753-.1876-.29289-.4419-.29289-.7071 0-.26524.10536-.51959.29289-.70713.18754.18754.44189.29289.70711.29289h1v-1.5c0-.92826.3687-1.8185 1.0251-2.47488.6564-.65637 1.5466-1.02512 2.4749-1.02512h.6c.2652 0 .5196.10535.7071.29289s.2929.44189.2929.70711c0 .26521-.1054.51957-.2929.7071-.1875.18754-.4419.2929-.7071.2929h-.6c-.197 0-.392.03879-.574.11418-.182.07538-.3474.18587-.4867.32516-.1392.13928-.2497.30464-.3251.48663s-.1142.37704-.1142.57403v1.5h2.1c.2652 0 .5196.10535.7071.29289s.2929.44189.2929.70713c0 .2652-.1054.5195-.2929.7071-.1875.1875-.4419.2929-.7071.2929h-2.1v7h4c.5304 0 1.0391-.2107 1.4142-.5858s.5858-.8838.5858-1.4142v-12.00002c0-.53044-.2107-1.03914-.5858-1.41422-.3751-.37507-.8838-.58578-1.4142-.58578z" fill="#fff" fill-rule="evenodd"></path></svg></a>
                    <a class="linkedin social-icon" href="https://www.linkedin.com/company/moodle" title="Go to LinkedIn" rel="noopener" aria-label="(external link, opens in a new tab)"><svg fill="none" height="20" viewBox="0 0 20 20" width="100%" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m4 .00097656c-1.06087 0-2.07828.42142744-2.82843 1.17157344-.750143.75014-1.17157 1.76756-1.17157 2.82843v12.00002c0 1.0608.421427 2.0783 1.17157 2.8284.75015.7501 1.76756 1.1716 2.82843 1.1716h12c1.0609 0 2.0783-.4215 2.8284-1.1716.7502-.7501 1.1716-1.7676 1.1716-2.8284v-12.00002c0-1.06087-.4214-2.07829-1.1716-2.82843-.7501-.750146-1.7675-1.17157344-2.8284-1.17157344zm-2 4.00000344c0-.53044.21071-1.03914.58579-1.41422.37507-.37507.88378-.58578 1.41421-.58578h12c.5304 0 1.0391.21071 1.4142.58578.3751.37508.5858.88378.5858 1.41422v12.00002c0 .5304-.2107 1.0391-.5858 1.4142s-.8838.5858-1.4142.5858h-12c-.53043 0-1.03914-.2107-1.41421-.5858-.37508-.3751-.58579-.8838-.58579-1.4142zm5 5c0-.26522-.10536-.51957-.29289-.70711-.18754-.18754-.44189-.29289-.70711-.29289s-.51957.10535-.70711.29289c-.18753.18754-.29289.44189-.29289.70711v6.00002c0 .2652.10536.5195.29289.7071.18754.1875.44189.2929.70711.2929s.51957-.1054.7071-.2929c.18753-.1876.29289-.4419.29289-.7071zm.5-3.5c0 .39782-.15804.77935-.43934 1.06066-.2813.2813-.66284.43934-1.06066.43934s-.77936-.15804-1.06066-.43934c-.2813-.28131-.43934-.66284-.43934-1.06066 0-.39783.15804-.77936.43934-1.06066.2813-.28131.66284-.43934 1.06066-.43934s.77936.15803 1.06066.43934c.2813.2813.43934.66283.43934 1.06066zm2.5 2.5c.34 0 .64.17.82.428.5154-.2809 1.093-.42805 1.68-.428 2.16 0 3.5 1.926 3.5 3.57102v3.429c0 .2652-.1054.5195-.2929.7071-.1875.1875-.4419.2929-.7071.2929s-.5196-.1054-.7071-.2929c-.1875-.1876-.2929-.4419-.2929-.7071v-3.43c0-.768-.66-1.57102-1.5-1.57102-.524 0-1.103.28502-1.5.96302v4.038c0 .2652-.1054.5195-.2929.7071-.1875.1875-.4419.2929-.7071.2929-.26522 0-.51957-.1054-.70711-.2929-.18753-.1876-.29289-.4419-.29289-.7071v-6.00002c0-.26522.10536-.51957.29289-.70711.18754-.18754.44189-.29289.70711-.29289z" fill="#fff" fill-rule="evenodd"></path></svg></a>
                    <a class="twitter social-icon" href="https://twitter.com/moodle" title="Go to Twitter" rel="noopener" aria-label="(external link, opens in a new tab)"><svg fill="none" height="19" viewBox="0 0 22 19" width="100%" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m13.8489 2.65933c-.4568-.00019-.908.10106-1.321.29642-.4129.19537-.7773.47998-1.067.8333-.2896.35332-.4971.76653-.6076 1.20981s-.1212.90556-.0314 1.35347c.031.1552.0246.31553-.0184.4678-.0431.15227-.1218.29214-.2294.40811-.1077.11598-.2414.20474-.39.25899-.1487.05426-.3081.07246-.46516.0531-2.15027-.26414-4.17728-1.14804-5.834-2.544.031.602.24 1.242.693 1.912l.679 1.004-1.115.475-.215.092c.16.183.352.37.567.555.28741.24601.59147.47188.91.676l.011.007h.001l1.548.93897-1.62.81c-.08.04-.16.076-.24.108.34834.2895.73208.5334 1.142.726l1.39.657-1.164 1.004c-.635.548-1.274.957-2.103 1.173 1.27143.6773 2.69044 1.0301 4.131 1.027 4.80596 0 8.67596-3.835 8.67596-8.53397v-.52l.425-.299c.664-.466 1.133-1.096 1.469-1.817h-2.16l-.272-.57c-.2504-.52733-.6453-.9728-1.1388-1.28469-.4935-.31188-1.0654-.47739-1.6492-.47731zm-11.27996 7.3c-.09437.10807-.16437.23517-.20527.37267-.04089.1376-.05171.2823-.03173.4243.113.801.592 1.491 1.122 2.018.144.143.298.28.46.411l-.075.02c-.481.12-1.13.145-2.211.04-.20414-.02-.40951.0232-.58825.1239-.178739.1006-.322212.2537-.410964.4387-.088751.1849-.118488.3926-.085178.595s.128055.3897.27139.5364c1.000772 1.023 2.196292 1.8351 3.516022 2.3884 1.31973.5534 2.73693.8369 4.16798.8336 5.71296 0 10.39896-4.436 10.66396-10.03397 1.29-1.083 1.935-2.55 2.283-3.883.0387-.14794.043-.3028.0124-.45264-.0305-.14985-.095-.2907-.1885-.41171-.0935-.12102-.2135-.21898-.3507-.28636-.1373-.06738-.2882-.10237-.4412-.10229h-2.353c-.5755-.89367-1.4166-1.58456-2.4051-1.97556-.9884-.39101-2.0745-.462488-3.1057-.204392-1.0312.258092-1.9556.832792-2.64328 1.643332-.68771.81054-1.10418 1.81619-1.19088 2.87562-1.84335-.47985-3.49267-1.51919-4.721-2.975-.10878-.12861-.24829-.22767-.40558-.28797-.15729-.06029-.06029-.32727-.07988-.49415-.05694-.16688.02295-.32526.08767-.46045.18818-.13518.10051-.24278.23353-.31282.38673-.606 1.322-.722 2.846-.046 4.396l-.234.1c-.22393.09542-.40536.26923-.5103.48886-.10493.21963-.12616.46999-.0597.70414.186.652.604 1.228 1.032 1.685z" fill="#fff" fill-rule="evenodd"></path></svg></a>
                    <a class="youtube social-icon" href="https://www.youtube.com/moodle" title="Go to Youtube" rel="noopener" aria-label="(external link, opens in a new tab)"><svg fill="none" height="20" viewBox="0 0 23 20" width="100%" xmlns="http://www.w3.org/2000/svg"><path d="m3.20091 17.3398-.19612.9806zm16.59819 0 .1961.9806zm.1139-14.53739.2096-.9778zm-16.82604 0 .20952.97781zm6.41304 4.19721.5145-.85749c-.30893-.18536-.69369-.19022-1.0072-.01271-.31351.1775-.5073.50993-.5073.8702zm0 5.99998h-1c0 .3603.19379.6927.5073.8702s.69827.1727 1.0072-.0127zm5-2.99998.5145.85748c.3012-.1807.4855-.5062.4855-.85748 0-.35126-.1843-.67677-.4855-.85749zm-14-5.23416v10.49954h2v-10.49954zm22 10.49954v-10.49954h-2v10.49954zm-19.49521 3.0554c5.60794 1.1216 11.38251 1.1216 16.99041 0l-.3922-1.9612c-5.349 1.0698-10.85696 1.0698-16.20598 0zm17.11781-16.49579c-5.6839-1.21797-11.5613-1.21797-17.24517 0l.41905 1.95561c5.40764-1.15878 10.99942-1.15878 16.40702 0zm2.3774 2.94085c0-1.4182-.9907-2.64369-2.3774-2.94085l-.4191 1.95561c.4646.09955.7965.51011.7965.98524zm-2 10.49954c0 .5319-.3754.9899-.897 1.0942l.3922 1.9612c1.4564-.2913 2.5048-1.5701 2.5048-3.0554zm-20 0c0 1.4853 1.04836 2.7641 2.50479 3.0554l.39223-1.9612c-.52158-.1043-.89702-.5623-.89702-1.0942zm2-10.49954c0-.47513.33191-.88569.79648-.98524l-.41905-1.95561c-1.38672.29716-2.37743 1.52265-2.37743 2.94085zm6 2.23416v5.99998h2v-5.99998zm1.5145 6.85748 5-3-1.029-1.71497-5 2.99997zm5-4.71497-5-3-1.029 1.71498 5 2.99999z" fill="#fff"></path></svg></a>
                    <a class="instagram social-icon" href="https://www.instagram.com/moodlehq/" title="Go to Instagram" rel="noopener" aria-label=".cls-1{fill:#fff;}(external link, opens in a new tab)"><svg fill="none" height="20" width="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.57 47.57"><defs><style>.cls-1{fill:#fff;}</style></defs><g id="objects"><g><path class="cls-1" d="M38.06,0H9.51C4.26,0,0,4.26,0,9.51v28.54c0,5.25,4.26,9.51,9.51,9.51h28.54c5.25,0,9.51-4.26,9.51-9.51V9.51c0-5.25-4.26-9.51-9.51-9.51Zm3.75,31.55c0,5.66-4.6,10.26-10.26,10.26h-15.53c-5.66,0-10.26-4.6-10.26-10.26v-15.53c0-5.66,4.6-10.26,10.26-10.26h15.53c5.66,0,10.26,4.6,10.26,10.26v15.53Z"></path><path class="cls-1" d="M23.79,17.65c-3.39,0-6.14,2.75-6.14,6.14s2.75,6.14,6.14,6.14,6.14-2.75,6.14-6.14-2.75-6.14-6.14-6.14Z"></path><path class="cls-1" d="M31.55,8.85h-15.53c-3.95,0-7.17,3.22-7.17,7.17v15.53c0,3.95,3.22,7.17,7.17,7.17h15.53c3.95,0,7.17-3.22,7.17-7.17v-15.53c0-3.95-3.22-7.17-7.17-7.17Zm-7.76,24.16c-5.09,0-9.23-4.14-9.23-9.23s4.14-9.23,9.23-9.23,9.23,4.14,9.23,9.23-4.14,9.23-9.23,9.23Zm9.63-16.77c-1.23,0-2.22-.99-2.22-2.22s.99-2.22,2.22-2.22,2.22,.99,2.22,2.22-.99,2.22-2.22,2.22Z"></path></g></g></svg></a>
                    <a class="mastodon social-icon" rel="me noopener" href="https://openedtech.social/@moodle" title="Go to Mastodon" aria-label=".st0{fill:none;stroke:#FFFFFF;stroke-width:15;stroke-miterlimit:10;}.st1{fill:#FFFFFF;stroke:#FFFFFF;stroke-width:5;stroke-miterlimit:10;}(external link, opens in a new tab)"><svg fill="none" height="20" width="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve"><style>.st0{fill:none;stroke:#FFFFFF;stroke-width:15;stroke-miterlimit:10;}.st1{fill:#FFFFFF;stroke:#FFFFFF;stroke-width:5;stroke-miterlimit:10;}</style><g><g id="Ac5ZCm_00000005264104785831267240000003427963782964771506_"><g><path class="st0" d="M133.38,175.86c-0.95,0.15-1.93,0.25-2.9,0.46c-12.29,2.67-24.68,2.89-37.13,1.42c-18.29-2.16-27.72-12.14-28.22-29.84c-0.13-4.53,1.75-6.35,5.92-5.35c23.56,5.62,47.28,5.89,71.13,2.38c11.67-1.71,22.3-5.72,31.41-13.12c6.53-5.31,10.21-13.39,11.2-21.75c0.63-5.28,1.48-10.54,1.55-15.82c0.19-13.55,1.04-27.27-0.63-40.64c-2.75-22.04-15.56-34.89-37.15-39.1c-27.61-5.38-55.28-5.22-82.95-0.52c-18.01,3.06-32.98,16.28-38.28,33.76c-1.18,3.9-2,7.89-2.05,11.8c-0.27,21.18,0.02,42.39,0.96,63.56c0.34,7.58,1.51,15.08,3.62,22.36c6.21,21.49,24.56,37.52,46.5,41.86c17.24,3.4,34.67,3.03,52.19-2.07C134.78,183.44,135.05,182.76,133.38,175.86z"></path></g></g><path class="st1" d="M105.89,53.44c10.11-10.48,21.07-13.28,32.7-8.24c9.87,4.28,15.46,12.02,16.07,22.65c0.65,11.29,0.44,22.62,0.59,33.94c0.03,2.57,0.03,5.15-0.02,7.72c-0.07,3.62-2,5.85-4.96,5.85c-2.99,0-4.9-2.2-4.89-5.84c0-10.5,0.16-21,0.04-31.49c-0.05-4.2-0.31-8.46-1.13-12.56c-1.35-6.68-6.9-11.49-13.77-12.4c-7.21-0.95-13.15,1.06-17.25,7.55c-1.72,2.72-2.52,5.43-2.43,8.65c0.18,6.99,0.07,14,0.05,21c-0.01,3.94-1.78,6.13-4.91,6.14c-3.14,0.01-4.95-2.17-4.96-6.08c-0.02-7.2-0.44-14.44,0.12-21.6c0.51-6.55-6.8-14.57-12.88-15.65c-10.83-1.93-20.57,4.67-21.18,15.64c-0.67,12.21-0.41,24.48-0.55,36.72c-0.02,1.75,0.08,3.51-0.04,5.25c-0.19,2.75-2.2,4.72-4.78,4.68c-2.75-0.05-4.34-1.59-4.96-4.21c-0.07-0.3-0.09-0.61-0.09-0.92c0.1-13.58-0.08-27.17,0.39-40.74c0.43-12.34,6.57-21.19,18.49-25.02C87.37,40.67,97.65,43.57,105.89,53.44z"></path></g></svg></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= BASE_URL ?>frontend/js/navbar.js"></script>
    <script src="<?= BASE_URL ?>frontend/js/footer.js"></script>
</body>
</html>