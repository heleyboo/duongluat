<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package beautyspa
 */

get_header();
?>
    <div class="context-page">
        <div class="wrap-content">
            <div class="module-contact">
                <div class="heading-contact"><img class="img" src="images/img_new.jpg" alt="">
                    <h1 class="title">Contact </h1><a class="enquire-new" href="#!">ENQUIRE NOW</a>
                </div>
                <div class="body-contact">
                    <div class="col col-left">
                        <form class="form-register">
                            <h2 class="title">How can we help you?</h2>
                            <div class="group-input">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Your name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Your email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Your phone number">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" type="text" placeholder="Your message"></textarea>
                                </div><a class="btn btn-primary color-light">Submit</a>
                            </div>
                        </form>
                    </div>
                    <div class="col col-right">
                        <h2 class="title">Contact Info</h2>
                        <div class="group-info">
                            <p><strong>Phone: </strong><span>+65-6536 0036</span></p>
                            <p> <strong>Email: </strong><span>duongluat@gmail.com</span></p>
                            <p><strong>Office Address: </strong><span>High Street Centre, #18-03, 1 North Bridge Road, Singapore – 179094</span></p>
                            <div class="maps"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.648304733829!2d106.68770791423553!3d10.76156476241192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f10c79a066d%3A0xcfd0fdd271213145!2zVHLhuqduIMSQw6xuaCBYdSwgUXXhuq1uIDEsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1601141242873!5m2!1svi!2s" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="content-sidebar-list">
                <div class="item">
                    <div class="heading-item">OUR SERVICES</div>
                    <div class="body-item">
                        <div class="link-list"><a class="item-link" href="#!">Tư vấn pháp lý</a><a class="item-link" href="#!">Dịch vụ dịch thuật</a><a class="item-link" href="#!">Business Matching</a><a class="item-link" href="#!">Dịch vụ kiểm toán</a><a class="item-link" href="#!">Thiết kế website</a></div>
                    </div>
                </div>
                <div class="item">
                    <div class="heading-item">SCHEDULE A CALL</div>
                    <div class="body-item">
                        <div class="sidebar-form">
                            <form>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Your name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Your email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Your phone number">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" type="text" placeholder="Your message"></textarea>
                                </div>
                                <button class="btn btn-primary w-100" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="heading-item">LEARNING GUIDE</div>
                    <div class="body-item">
                        <div class="link-list"><a class="item-link" href="#!">Tư vấn pháp lý</a><a class="item-link" href="#!">Dịch vụ dịch thuật</a><a class="item-link" href="#!">Business Matching</a><a class="item-link" href="#!">Dịch vụ kiểm toán</a><a class="item-link" href="#!">Thiết kế website</a></div>
                    </div>
                </div>
                <div class="item">
                    <div class="heading-item">MOST POPULAR BLOGS</div>
                    <div class="body-item">
                        <div class="link-list"><a class="item-link" href="#!">Tư vấn pháp lý</a><a class="item-link" href="#!">Dịch vụ dịch thuật</a><a class="item-link" href="#!">Business Matching</a><a class="item-link" href="#!">Dịch vụ kiểm toán</a><a class="item-link" href="#!">Thiết kế website</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
