async function getData() {
    const response = await fetch('../data/products.json');
    const jsonData = await response.json();
    return jsonData;
  }
  
  async function setData() {
    const data = await getData();
    const container = document.querySelector('#product-list');
    const womanCategory = data.Woman;
  
    let products = [];
  
    for (const subcategory in womanCategory) {
      const sub = womanCategory[subcategory];
      if (Array.isArray(sub)) {
        sub.forEach(item => {
          if (item && item.name) products.push(item);
        });
      }
      else if (sub && sub.name) {
        products.push(sub);
      }
    }
  
    products.slice(0, 3).forEach((product) => {
        const card = createProductCard(product);
        container.appendChild(card);
      });
    }
  
  function createProductCard(product) {
    const col = document.createElement('div');
    col.className = 'col-md-4 mb-4';
    col.id = `${product.id}`;
  
    const card = document.createElement('div');
    card.className = 'card h-100';
    card.style.borderRadius = '16px';
    
  
    const img = document.createElement('img');
    img.className = 'img-fluid mx-auto d-block mt-3 w-75';
    img.src = product.img_path;
    img.alt = product.name;
  
    const cardBody = document.createElement('div');
    cardBody.className = 'card-body';
  
    const name = document.createElement('h5');
    name.className = 'card-title';
    name.textContent = product.name;
  
    const size = document.createElement('p');
    size.className = 'card-text';
    size.textContent = `Size: ${product.size}`;
  
    const priceRow = document.createElement('div');
    priceRow.className = 'd-flex justify-content-between align-items-center';
  
    const price = document.createElement('p');
    price.className = 'card-text fw-bold mb-0';
    price.textContent = `Price: €${product.price}`;
  
    const button = document.createElement('button');
    button.className = 'btn btn-warning w-25 text-light';
    button.innerText = '+';
  
    priceRow.appendChild(price);
    priceRow.appendChild(button);
  
    cardBody.appendChild(name);
    cardBody.appendChild(size);
    cardBody.appendChild(priceRow);
  
    card.appendChild(img);
    card.appendChild(cardBody);
    col.appendChild(card);
  
    return col;
  }
  
  setData();
  