


<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>You added product to cart</p>
  </div>
</div>

<div id="myModal2" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>You already have this product in the cart</p>
  </div>
</div>

<div id="myModal3" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="moreinf">
    </div>
  </div>
</div>


<div class="men">
  <div class="container">
    <div class="col-md-4 sidebar_men">
      <h3>Search</h3>
      <ul id="dinGen" class="product-categories">
       <li><input type="search" id="srcovanje"></li>
       <li><input type="button" value="Search" class="srcuj anketaButton"></li>
      </ul>
      <h3>Brands</h3>
      <ul id="dinBrands" class="product-categories color">
        <?php

        dinBrands();

        ?>
      </ul>
      <h3>Price</h3>
      <ul id="dinPrice" class="product-categories">
        <?php

        dinPrice();

        ?>
      </ul>
    </div>
    <div class="col-lg-8 mens_right">
      <div class="dreamcrub">
        <ul class="breadcrumbs">
          <li class="home">
            <a href="index.php?page=main" title="Go to Home Page">Home</a>&nbsp;
            <span>&gt;</span>
          </li>
          <li class="home">&nbsp; Men / Women&nbsp;</li>
        </ul>

        <div class="clearfix"></div>
      </div>
      <div class="mens-toolbar">
        <div class="sort">
          <div class="sort-by">
            <label>Sort By</label>
            <select id="sortiraj" class="filter">
              <option value="0">Choose</option>
              <option value="NameASC">Name ASC</option>
              <option value="NameDSC">Name DSC</option>
              <option value="PriceASC">Price ASC</option>
              <option value="PriceDSC">Price DSC</option>
              
            </select>
          </div>
        </div>

        <div class="clearfix"></div>
      </div>
      <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
        <div class="clearfix"></div>

        <div id="products">
          <div class="container-fluid">
            <div class="row" id="dinProizvodi">
               <?php

             dinProizvodi();
              ?> 

            </div>
          </div>
        </div>
          <nav aria-label="Page navigation example">
              <ul class="pagination">
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
              </ul>
          </nav>
      </div>

    </div>
  </div>
</div>

