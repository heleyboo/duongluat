<?php
/*
Template Name: Translate service
*/
get_header('full');
?>
    <div class="context-page">
        <div class="wrap-content">
            <?php
            if ( is_active_sidebar( 'sidebar-block' ) ) {
                dynamic_sidebar( 'why-vietnam-block' );
            }
            ?>
            <div class="module-package-translate">
                <div class="service-description">
                    <div class="heading-sd"><span>SERVICE DESCRIPTION</span><span>FEE</span><span>TYPE</span><span>HELP</span></div>
                    <div class="body-sd">
                        <div id="desc-list">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <div class="heading-collapse" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <p class="mb-0"><i class="fas fa-caret-right"></i><span>Company Registration Fees / Package</span></p><i class="fas fa-plus"></i>
                                        </div>
                                    </h2>
                                </div>
                                <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#desc-list">
                                    <div class="card-body">
                                        <div class="context-list">
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <div class="heading-collapse" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <p class="mb-0"><i class="fas fa-caret-right"></i><span>Company Registration Fees / Package</span></p><i class="fas fa-plus"></i>
                                        </div>
                                    </h2>
                                </div>
                                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#desc-list">
                                    <div class="card-body">
                                        <div class="context-list">
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <div class="heading-collapse" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            <p class="mb-0"><i class="fas fa-caret-right"></i><span>Company Registration Fees / Package</span></p><i class="fas fa-plus"></i>
                                        </div>
                                    </h2>
                                </div>
                                <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#desc-list">
                                    <div class="card-body">
                                        <div class="context-list">
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                            <div class="item"><span>Incorporation of a Company in Singapore</span><span>S$699*</span><span>One Time Fee</span><span> <a href="contact.html">Contact Us</a></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="module-register-quick">
                <a class="btn btn-danger" data-toggle="collapse" href="#register-quick" role="button" aria-expanded="false" aria-controls="register-quick"><span>Get A Free Quotation to Get Started with this Service.</span><i class="fas fa-plus"></i></a>
                <div class="collapse" id="register-quick">
                    <?php echo do_shortcode('[contact-form-7 id="67" title="Contact" html_class="form"]') ?>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
