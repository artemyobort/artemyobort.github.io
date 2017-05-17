data.createData('db', JSON.stringify(
  {
    categories: [
      {
        id: 'cat1',
        title: 'Category 1'
      },
      {
        id: 'cat2',
        title: 'Category 2'
      },
      {
        id: 'cat3',
        title: 'Category 3'
      },
      {
        id: 'cat4',
        title: 'Category 4'
      }
    ],
    products: [
      {
        id: 'prod1',
        title: 'Product 1',
        category: 'cat1',
        description: 'description1',
        price: 100
      },
      {
        id: 'prod2',
        title: 'Product 2',
        category: 'cat2',
        description: 'description2',
        price: 110
      },
      {
        id: 'prod3',
        title: 'Product 3',
        category: 'cat3',
        description: 'description3',
        price: 120
      },
      {
        id: 'prod4',
        title: 'Product 4',
        category: 'cat4',
        description: 'description4',
        price: 120
      }
    ]
  }
));