<div class="col-md-4">
    <aside class="right-sidebar">
        
        <div class="search-widget">
            <form action="{{ route('blog') }}">
                <div class="input-group">
                <input name="term" value="{{ request('term') }}" type="text" class="form-control input-lg" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-lg btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
            </form>
        </div>
                                                                                                                                                             
        <?php $Development=['Custom Software Development','Web App Development','Mobile App Development','Website Development'];$categories=['Digital School Management System','Institute Management System','Online Exam Master','Smart Hotel Management System','Super Market Management System','Accounts Management System','E-Commerce Website Management System','Smart Hospital Management System','Inventory Management System','Fully Dynamic Website Management System'] ;   ?>
         

        <div class="widget">
            <div class="widget-heading">
                <h4>Software Development</h4>
            </div>
            <div class="widget-body" style="background-color:#b5dcb3;">
                <ul class="categories">
                    @foreach($Development as $dev)
                    <li>
                        <a href=""><i class="fa fa-angle-right"></i> <b>{{ $dev }}</b></a>
                        
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="widget">
            <div class="widget-heading">
                <h4>Our Best Projects</h4>
            </div>
            <div class="widget-body" style="background-color:#b5dcb3;">
                <ul class="categories">
                    @foreach($categories as $category)
                    <li>
                        <a href=""><i class="fa fa-angle-right"></i> <b>{{ $category }}</b></a>
                        
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
           <!--  <div class="widget-heading">
                <h4>Popular Posts</h4>
            </div>
           <div class="widget-body">
                <ul class="popular-posts">
                    
                </ul>
            </div>-->
        </div>

        <div class="widget">
         <!--   <div class="widget-heading">
                <h4>Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                
                </ul>
            </div>-->
        </div>

        <div class="widget">
        <!--    <div class="widget-heading">
                <h4>Archives</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                 
                </ul>
            </div>-->
        </div>

    </aside>
</div>