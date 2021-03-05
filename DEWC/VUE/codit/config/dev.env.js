'use strict'

const merge = require('webpack-merge')
const prodEnv = require('./prod.env')

module.exports = merge(prodEnv, {
  NODE_ENV: '"development"',
  TOKEN: '"f1edc881eb74136175c7ca15650b0e0605adfcf2"'
})
