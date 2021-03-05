'use strict'

const merge = require('webpack-merge')
const prodEnv = require('./prod.env')

module.exports = merge(prodEnv, {
  NODE_ENV: '"development"',
  TOKEN: '"17453b8ae38c153337d615b222edd5f4cae00d84"'
})
