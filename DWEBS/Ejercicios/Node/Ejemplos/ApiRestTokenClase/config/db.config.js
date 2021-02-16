//Esto debería ir en el .gitignore, se deja con fines didácticos.
module.exports = {
    // HOST: 'localhost',
    // USER: 'fernando',
    // PASSWORD: 'Chubaca2018',
    // DB: "APIRestNode",
    // dialect: "mysql",
    // port: 3306,
    // pool: {
    //   max: 5,
    //   min: 0,
    //   acquire: 30000,
    //   idle: 10000
    // }
    host: 'localhost',
    user: 'fernando',
    password: 'Chubaca2018',
    database: 'APIRestNode',
    port: 3306
};


/*
First five parameters are for MySQL connection.
pool is optional, it will be used for Sequelize connection pool configuration:

    max: maximum number of connection in pool
    min: minimum number of connection in pool
    idle: maximum time, in milliseconds, that a connection can be idle before being released
    acquire: maximum time, in milliseconds, that pool will try to get connection before throwing error
*/