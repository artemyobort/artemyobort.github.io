data.create('db', JSON.stringify(
  {
  categories: [
    {
      id: 'cat1',
      title: 'Category1'
    },
    {
      id: 'cat2',
      title: 'Category2'
    },
    {
      id: 'cat3',
      title: 'Category3'
    },
    {
      id: 'cat4',
      title: 'Category4'
    }
  ],
    products: [
      {
        id: 'prod1',
        title: 'Product1',
        category: 'cat1',
        description: 'description1',
        price: 100
      },
      {
        id: 'prod2',
        title: 'Product2',
        category: 'cat2',
        description: 'description2',
        price: 110
      },
      {
        id: 'prod3',
        title: 'Product3',
        category: 'cat3',
        description: 'description3',
        price: 120
      },
      {
        id: 'prod4',
        title: 'Product4',
        category: 'cat4',
        description: 'description4',
        price: 130
      },
      {
        id: 'prod5',
        title: 'Product5',
        category: 'cat1',
        description: 'description5',
        price: 140
      },
      {
        id: 'prod6',
        title: 'Product6',
        category: 'cat2',
        description: 'description6',
        price: 150
      },
      {
        id: 'prod7',
        title: 'Product7',
        category: 'cat3',
        description: 'description7',
        price: 160
      },
      {
        id: 'prod8',
        title: 'Product8',
        category: 'cat4',
        description: 'description8',
        price: 170
      }
    ]
  }
));
