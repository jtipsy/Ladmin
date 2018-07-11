define({ "api": [
  {
    "type": "get",
    "url": "/article/detail/37fb591be38db52dd1d5f04b689008f6?id=1",
    "title": "根据单个id获取资讯详情",
    "version": "0.0.1",
    "name": "Article_Detail",
    "group": "Article",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>资讯id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>资讯id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "title",
            "description": "<p>标题</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "author",
            "description": "<p>作者</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "from",
            "description": "<p>来源</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "desc",
            "description": "<p>描述</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>分类id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>内容</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "thumb",
            "description": "<p>封面</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "status",
            "description": "<p>状态</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "recommended",
            "description": "<p>推荐：1否2是</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "view_count",
            "description": "<p>浏览量</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>添加时间</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取资讯详情成功\",\n    \"article\": {\n        \"id\": 1,\n        \"title\": \"行业资讯标题\",\n        \"author\": \"Jtipsy\",\n        \"from\": \"肉之家\",\n        \"desc\": \"行业资讯描述\",\n        \"category_id\": 1,\n        \"content\": \"# 行业资讯内容\",\n        \"thumb\": http://images.meathome.com.cn/backend/uploads/20180206/20180206190820407.jpg,\n        \"status\": 1,\n        \"recommended\": 1,\n        \"view_count\": 0,\n        \"created_at\": \"2018-06-15 10:28:16\",\n        \"updated_at\": \"2018-06-15 10:28:16\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"message\": \"获取资讯详情失败！\",\n    \"article\": false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ArticleDetailController.php",
    "groupTitle": "Article"
  },
  {
    "type": "get",
    "url": "/article/index/37fb591be38db52dd1d5f04b689008f6",
    "title": "【首页】推荐资讯",
    "version": "0.0.1",
    "name": "Article_Index",
    "group": "Article",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>资讯id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "title",
            "description": "<p>标题</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "desc",
            "description": "<p>描述</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "thumb",
            "description": "<p>封面</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "view_count",
            "description": "<p>浏览量</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取资讯成功！\",\n    \"data\": {\n        \"id\": 1,\n        \"title\": 锡林郭勒最新羊肉价格统计,\n        \"desc\": 这是最新的羊肉信息,\n        \"thumb\": http://images.meathome.com.cn/backend/uploads/20180206/20180206190820407.jpg,\n        \"view_count\": 1\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"获取资讯失败！\",\n    \"article\": false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ArticleListController.php",
    "groupTitle": "Article"
  },
  {
    "type": "get",
    "url": "/article/industry/37fb591be38db52dd1d5f04b689008f6",
    "title": "行业资讯列表",
    "version": "0.0.1",
    "name": "Article_Industry",
    "group": "Article",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "total",
            "description": "<p>总条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "per_page",
            "description": "<p>每页条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "current_page",
            "description": "<p>当前页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "last_page",
            "description": "<p>总页数</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "next_page_url",
            "description": "<p>下一页</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "prev_page_url",
            "description": "<p>上一页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "from",
            "description": "<p>从</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "to",
            "description": "<p>至</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>资讯id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "title",
            "description": "<p>标题</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "author",
            "description": "<p>作者</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "desc",
            "description": "<p>描述</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>分类id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>内容</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "thumb",
            "description": "<p>封面</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "status",
            "description": "<p>状态</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "recommended",
            "description": "<p>推荐：1否2是</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "view_count",
            "description": "<p>浏览量</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>添加时间</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取行业资讯成功\",\n    \"article\": {\n        \"total\": 1,\n        \"per_page\": 5,\n        \"current_page\": 1,\n        \"last_page\": 1,\n        \"next_page_url\": null,\n        \"prev_page_url\": null,\n        \"from\": 1,\n        \"to\": 1,\n        \"data\": [\n            {\n        \t\t\"id\": 1,\n        \t\t\"title\": \"行业资讯标题\",\n        \t\t\"author\": \"Jtipsy\",\n        \t\t\"from\": \"肉之家\",\n        \t\t\"desc\": \"行业资讯描述\",\n        \t\t\"category_id\": 1,\n        \t\t\"content\": \"# 行业资讯内容\",\n        \t\t\"thumb\": \"images.meathome.com.cn/backend/uploads/20180615/20180615102739936.jpg\",\n        \t\t\"status\": 1,\n        \t\t\"recommended\": 1,\n        \t\t\"view_count\": 6,\n        \t\t\"created_at\": \"2018-06-15 10:28:16\",\n        \t\t\"updated_at\": \"2018-06-15 14:05:15\"\n        \t }\n        ]\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"获取行业资讯失败！\",\n    \"article\": false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ArticleIndustryController.php",
    "groupTitle": "Article"
  },
  {
    "type": "get",
    "url": "/article/offer/37fb591be38db52dd1d5f04b689008f6",
    "title": "市场报价列表",
    "version": "0.0.1",
    "name": "Article_Offer",
    "group": "Article",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "total",
            "description": "<p>总条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "per_page",
            "description": "<p>每页条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "current_page",
            "description": "<p>当前页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "last_page",
            "description": "<p>总页数</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "next_page_url",
            "description": "<p>下一页</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "prev_page_url",
            "description": "<p>上一页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "from",
            "description": "<p>从</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "to",
            "description": "<p>至</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>资讯id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "title",
            "description": "<p>标题</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "author",
            "description": "<p>作者</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "desc",
            "description": "<p>描述</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>分类id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>内容</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "thumb",
            "description": "<p>封面</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "status",
            "description": "<p>状态</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "recommended",
            "description": "<p>推荐：1否2是</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "view_count",
            "description": "<p>浏览量</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>添加时间</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取市场报价成功\",\n    \"article\": {\n        \"total\": 1,\n        \"per_page\": 5,\n        \"current_page\": 1,\n        \"last_page\": 1,\n        \"next_page_url\": null,\n        \"prev_page_url\": null,\n        \"from\": 1,\n        \"to\": 1,\n        \"data\": [\n            {\n        \t\t\"id\": 1,\n        \t\t\"title\": \"市场报价标题\",\n        \t\t\"author\": \"Jtipsy\",\n        \t\t\"from\": \"肉之家\",\n        \t\t\"desc\": \"市场报价描述\",\n        \t\t\"category_id\": 1,\n        \t\t\"content\": \"# 市场报价内容\",\n        \t\t\"thumb\": \"images.meathome.com.cn/backend/uploads/20180615/20180615102739936.jpg\",\n        \t\t\"status\": 1,\n        \t\t\"recommended\": 1,\n        \t\t\"view_count\": 6,\n        \t\t\"created_at\": \"2018-06-15 10:28:16\",\n        \t\t\"updated_at\": \"2018-06-15 14:05:15\"\n        \t }\n        ]\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"获取市场报价失败！\",\n    \"article\": false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ArticleOfferController.php",
    "groupTitle": "Article"
  },
  {
    "type": "get",
    "url": "/article/policy/37fb591be38db52dd1d5f04b689008f6",
    "title": "政策法规列表",
    "version": "0.0.1",
    "name": "Article_Policy",
    "group": "Article",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "total",
            "description": "<p>总条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "per_page",
            "description": "<p>每页条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "current_page",
            "description": "<p>当前页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "last_page",
            "description": "<p>总页数</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "next_page_url",
            "description": "<p>下一页</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "prev_page_url",
            "description": "<p>上一页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "from",
            "description": "<p>从</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "to",
            "description": "<p>至</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>资讯id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "title",
            "description": "<p>标题</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "author",
            "description": "<p>作者</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "desc",
            "description": "<p>描述</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>分类id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>内容</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "thumb",
            "description": "<p>封面</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "status",
            "description": "<p>状态</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "recommended",
            "description": "<p>推荐：1否2是</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "view_count",
            "description": "<p>浏览量</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>添加时间</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取政策法规成功\",\n    \"article\": {\n        \"total\": 1,\n        \"per_page\": 5,\n        \"current_page\": 1,\n        \"last_page\": 1,\n        \"next_page_url\": null,\n        \"prev_page_url\": null,\n        \"from\": 1,\n        \"to\": 1,\n        \"data\": [\n            {\n        \t\t\"id\": 1,\n        \t\t\"title\": \"政策法规标题\",\n        \t\t\"author\": \"Jtipsy\",\n        \t\t\"from\": \"肉之家\",\n        \t\t\"desc\": \"政策法规描述\",\n        \t\t\"category_id\": 1,\n        \t\t\"content\": \"# 政策法规内容\",\n        \t\t\"thumb\": \"images.meathome.com.cn/backend/uploads/20180615/20180615102739936.jpg\",\n        \t\t\"status\": 1,\n        \t\t\"recommended\": 1,\n        \t\t\"view_count\": 6,\n        \t\t\"created_at\": \"2018-06-15 10:28:16\",\n        \t\t\"updated_at\": \"2018-06-15 14:05:15\"\n        \t }\n        ]\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"获取政策法规失败！\",\n    \"article\": false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ArticlePolicyController.php",
    "groupTitle": "Article"
  },
  {
    "type": "get",
    "url": "/article/recommend/37fb591be38db52dd1d5f04b689008f6",
    "title": "推荐资讯列表",
    "version": "0.0.1",
    "name": "Article_Recommend",
    "group": "Article",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "total",
            "description": "<p>总条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "per_page",
            "description": "<p>每页条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "current_page",
            "description": "<p>当前页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "last_page",
            "description": "<p>总页数</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "next_page_url",
            "description": "<p>下一页</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "prev_page_url",
            "description": "<p>上一页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "from",
            "description": "<p>从</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "to",
            "description": "<p>至</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>资讯id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "title",
            "description": "<p>标题</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "author",
            "description": "<p>作者</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "desc",
            "description": "<p>描述</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>分类id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>内容</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "thumb",
            "description": "<p>封面</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "status",
            "description": "<p>状态</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "recommended",
            "description": "<p>推荐：1否2是</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "view_count",
            "description": "<p>浏览量</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>添加时间</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取推荐资讯成功\",\n    \"article\": {\n        \"total\": 1,\n        \"per_page\": 5,\n        \"current_page\": 1,\n        \"last_page\": 1,\n        \"next_page_url\": null,\n        \"prev_page_url\": null,\n        \"from\": 1,\n        \"to\": 1,\n        \"data\": [\n            {\n        \t\t\"id\": 1,\n        \t\t\"title\": \"推荐资讯标题\",\n        \t\t\"author\": \"Jtipsy\",\n        \t\t\"from\": \"肉之家\",\n        \t\t\"desc\": \"推荐资讯描述\",\n        \t\t\"category_id\": 1,\n        \t\t\"content\": \"# 推荐资讯内容\",\n        \t\t\"thumb\": \"images.meathome.com.cn/backend/uploads/20180615/20180615102739936.jpg\",\n        \t\t\"status\": 1,\n        \t\t\"recommended\": 1,\n        \t\t\"view_count\": 6,\n        \t\t\"created_at\": \"2018-06-15 10:28:16\",\n        \t\t\"updated_at\": \"2018-06-15 14:05:15\"\n        \t }\n        ]\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"获取推荐资讯失败！\",\n    \"article\": false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ArticleRecommendController.php",
    "groupTitle": "Article"
  },
  {
    "type": "get",
    "url": "/brand/collect/37fb591be38db52dd1d5f04b689008f6?uid=openid&brand_id=1",
    "title": "收藏品牌",
    "version": "0.0.1",
    "name": "Brand_Collect",
    "group": "Brand",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户Openid</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "brand_id",
            "description": "<p>品牌id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户Openid</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "brand_id",
            "description": "<p>品牌id</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"收藏成功\"\n    \"data\": {\n        \"uid\": odzwM5Ma7Hbei5bQWgaB_LTwFn1Y,\n        \"brand_id\": 1,\n        \"created_at\": 2018-04-16 17:38:35,\n        \"updated_at\": 2018-04-16 17:38:35,\n        \"id\": 1,\n    },\n    \"meta\": {\n        \"status_code\": 200,\n        \"msg\": \"已经收藏过了\",\n        \"data\": [\n           {\n              \"id\": 1\n           }\n        ]\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "  {\n      \"status_code\": 403\n\t\t \"msg\": \"非法请求\",\n  }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/BrandListController.php",
    "groupTitle": "Brand"
  },
  {
    "type": "get",
    "url": "/brand/collect/cancel/37fb591be38db52dd1d5f04b689008f6?uid=openid&brand_id=1",
    "title": "取消收藏",
    "version": "0.0.1",
    "name": "Brand_Collect_Cancel",
    "group": "Brand",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户Openid</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "brand_id",
            "description": "<p>品牌id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户Openid</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "brand_id",
            "description": "<p>品牌id</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"请求成功！\",\n    \"data\":true\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/BrandListController.php",
    "groupTitle": "Brand"
  },
  {
    "type": "get",
    "url": "/brand/collect/list/37fb591be38db52dd1d5f04b689008f6?uid=openid",
    "title": "品牌收藏列表",
    "version": "0.0.1",
    "name": "Brand_Collect_List",
    "group": "Brand",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户Openid</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户Openid</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "brand_id",
            "description": "<p>品牌id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "logo",
            "description": "<p>品牌logo</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>品牌名称</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>收藏id</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"请求成功！\",\n    \"CollectList\": {\n        \"brand_id\": 1,\n        \"logo\": /backend/uploads/20180418/20180418154924993.jpg,\n        \"name\": 蒙高丽亚,\n        \"id\": 1\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"请求失败！\",\n    \"CollectList\": false\n}",
          "type": "json"
        },
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/BrandListController.php",
    "groupTitle": "Brand"
  },
  {
    "type": "get",
    "url": "/brand/detail/37fb591be38db52dd1d5f04b689008f6?id=1",
    "title": "品牌详情",
    "version": "0.0.1",
    "name": "Brand_Detail",
    "group": "Brand",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>品牌id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>品牌id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>品牌名称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "logo",
            "description": "<p>品牌Logo</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>联系电话</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "describe",
            "description": "<p>品牌介绍</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "enterprise",
            "description": "<p>归属企业</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "atlas1",
            "description": "<p>品牌图集1</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "atlas2",
            "description": "<p>品牌图集2</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "atlas3",
            "description": "<p>品牌图集3</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "atlas4",
            "description": "<p>品牌图集4</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "level1",
            "description": "<p>普通 value = 1</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "level2",
            "description": "<p>绿色 value = 2</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "level3",
            "description": "<p>有机 value = 3</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "level4",
            "description": "<p>无公害 value = 4</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "level5",
            "description": "<p>原生态 value = 5</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "store_id",
            "description": "<p>店铺id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "store_name",
            "description": "<p>店铺名称</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "store_type",
            "description": "<p>店铺类型：1直营店、2专营店、3综合店、4代理商</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "store_phone",
            "description": "<p>店铺电话</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "store_address",
            "description": "<p>店铺地址</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "store_describe",
            "description": "<p>店铺描述</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "store_more1",
            "description": "<p>标签：售多地 0：无效 1：有效</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "store_more2",
            "description": "<p>标签：售本地 0：无效 1：有效</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "store_recommended",
            "description": "<p>推荐：1推荐 2否</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "product_id",
            "description": "<p>产品id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "product_thumb",
            "description": "<p>产品图片</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "product_name",
            "description": "<p>产品名称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "product_species",
            "description": "<p>产品种类</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "product_recommended",
            "description": "<p>产品推荐状态 1：推荐 2否</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "product_level",
            "description": "<p>产品等级 1:普通 2：绿色 3：有机 4:无公害 5：原生态</p>"
          },
          {
            "group": "Success 200",
            "type": "Decimal",
            "optional": false,
            "field": "product_price",
            "description": "<p>产品价格</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "product_specifications",
            "description": "<p>产品规格 1：件 2：袋 3：条 4：盒 5：箱 6：块 7：个 8：吨 9：卷 10：斤 11：公斤 12：g 13：kg</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "product_describe",
            "description": "<p>产品描述</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "product_Country_of_origin",
            "description": "<p>产品原产地</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取品牌详情成功！\",\n    \"brand\": {\n        \"id\": 1,\n        \"logo\": http://images.meathome.com.cn/backend/uploads/20180206/20180206182903697.jpg,\n        \"name\": 蒙高丽亚,\n        \"phone\": 15034889912,\n        \"describe\": 食于自然、忠于生活,\n        \"enterprise\": 锡林郭勒盟蒙高丽亚农牧业发展有限公司,\n        \"level1\": 1,\n        \"level2\": 2,\n        \"level3\": 3,\n        \"level4\": 4,\n        \"level5\": 5\n    },\n    \"store\": {\n        \"store_id\": 1,\n        \"store_name\": 蒙高丽亚直营店,\n        \"store_type\": 1,\n        \"store_phone\": 400-8000-02,\n        \"store_address\": 店铺地址,\n        \"store_describe\": 店铺描述,\n        \"store_more1\": 1,\n        \"store_more2\": 1,\n        \"store_recommended\": 2\n    },\n    \"product\": {\n        \"brand_id\": 1,\n        \"product_id\": 1,\n        \"product_thumb\": /backend/uploads/20180329/20180329093943155.jpg,\n        \"product_name\": 羔羊肋排,\n        \"product_species\": 2,\n        \"product_recommended\": 1,\n        \"product_level\": 2,\n        \"product_price\": 550.00,\n        \"product_specifications\": 13,\n        \"product_describe\": 此处为产品描述,\n        \"product_Country_of_origin\": 内蒙古巴彦淖尔国家级经济技术开发区,\n    },\n    \"status\": {\n    \t\"status\": 0\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "  {\n      \"status_code\": 404,\n      \"msg\": \"获取品牌详情失败！\",\n      \"brand\": false\n      \"store\": false\n      \"product\": false\n      \"status\": {\n\t\t\t\"status\": 0\n  \t }\n  }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/BrandListController.php",
    "groupTitle": "Brand"
  },
  {
    "type": "get",
    "url": "/brand/index/37fb591be38db52dd1d5f04b689008f6",
    "title": "【首页】推荐品牌",
    "version": "0.0.1",
    "name": "Brand_Index",
    "group": "Brand",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>品牌id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "logo",
            "description": "<p>LOGO</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>品牌名称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>客服电话</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "view_count",
            "description": "<p>浏览量</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取品牌成功！\",\n    \"brand\": {\n        \"id\": 1,\n        \"logo\": https://assets.meathome.com.cn/FieZhfZTM9bDIMhH-2Bcf51LL0J5,\n        \"name\": 蒙高丽亚,\n        \"phone\": 15034889912,\n        \"view_count\": 1\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"获取品牌失败！\",\n    \"article\": false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/BrandListController.php",
    "groupTitle": "Brand"
  },
  {
    "type": "get",
    "url": "/brand/list/37fb591be38db52dd1d5f04b689008f6?sheep=1&cow=1&pig=1&chicken=1&duck=1",
    "title": "【找肉】全部品牌",
    "version": "0.0.1",
    "name": "Brand_List",
    "group": "Brand",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "sheep",
            "description": "<p>羊肉：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "cow",
            "description": "<p>牛肉：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "pig",
            "description": "<p>猪肉：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "chicken",
            "description": "<p>鸡肉：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "duck",
            "description": "<p>鸭肉：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "goose",
            "description": "<p>鹅肉：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "fish",
            "description": "<p>鱼肉：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "camel",
            "description": "<p>驼肉：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "donkey",
            "description": "<p>驴肉：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "horse",
            "description": "<p>马肉：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "other",
            "description": "<p>其他：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "level1",
            "description": "<p>普通：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "level2",
            "description": "<p>绿色：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "level3",
            "description": "<p>有机：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "level4",
            "description": "<p>无公害：1</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "level5",
            "description": "<p>原生态：1</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>品牌id</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "logo",
            "description": "<p>品牌logo</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "name",
            "description": "<p>品牌名</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "sort",
            "description": "<p>排序</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n  {\n      \"status_code\": 200,\n      \"message\": \"请求成功！\",\n      \"data\":{\n\t\t\t  \"id\": 1, \n\t\t\t  \"logo\": https://images.mongoliaci.com/backend/uploads/20180423/20180423141310207.jpg, \n\t\t\t  \"name\": 蒙高丽亚, \n\t\t\t  \"sort\": M, \n\t\t }\n  }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"没有找到！\",\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/BrandListController.php",
    "groupTitle": "Brand"
  },
  {
    "type": "post",
    "url": "/business/licensee/37fb591be38db52dd1d5f04b689008f6",
    "title": "上传营业执照",
    "version": "0.0.1",
    "name": "Business_Licensee",
    "group": "CertiFicaTion",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "file[]",
            "description": "<p>图片名称</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"successful\",\n    \"name\": \"20180615165322429.jpg\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"msg\": \"Undefined variable: filename\",\n    \"status_code\": 500,\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/CertificationController.php",
    "groupTitle": "CertiFicaTion"
  },
  {
    "type": "post",
    "url": "/completion/certification/37fb591be38db52dd1d5f04b689008f6?uid=openid",
    "title": "补全认证信息",
    "version": "0.0.1",
    "name": "Completion_Certification",
    "group": "CertiFicaTion",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "filepath",
            "description": "<p>营业执照路径</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>认证id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "business_license",
            "description": "<p>营业执照</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "agent",
            "description": "<p>代销达人：0否1是</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "Catering_customer",
            "description": "<p>餐饮客户：0否1是</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "Corporate_client",
            "description": "<p>企业客户：0否1是</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "Share_talent",
            "description": "<p>分享达人：0否1是</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "Production_service",
            "description": "<p>生产服务：0否1是</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "Brand",
            "description": "<p>品牌厂商：0否1是</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "Cold_chain_logistic",
            "description": "<p>冷链物流：0否1是</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>认证时间</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "updated_at",
            "description": "<p>补全时间</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"successful\",\n    \"data\": {\n    \t\"id\": 1,\n    \t\"mobile\": \"15034889912\",\n    \t\"uid\": \"5Pywdvujkesyuq3U0SadDKeJOYtd\",\n    \t\"business_license\": null,\n    \t\"agent\": 0,\n    \t\"Catering_customer\": 0,\n    \t\"Corporate_client\": 0,\n    \t\"Share_talent\": 0,\n    \t\"Production_service\": 0,\n    \t\"Brand\": 0,\n    \t\"Cold_chain_logistic\": 0,\n    \t\"created_at\": \"2018-06-15 16:48:28\",\n    \t\"updated_at\": \"2018-06-15 17:06:33\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求\",\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/CertificationController.php",
    "groupTitle": "CertiFicaTion"
  },
  {
    "type": "get",
    "url": "/discover/index/37fb591be38db52dd1d5f04b689008f6",
    "title": "供应列表",
    "version": "0.0.1",
    "name": "Discover_Index",
    "group": "Discover",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>供应id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "nickName",
            "description": "<p>发布者昵称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "avatarUrl",
            "description": "<p>发布者头像</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "num",
            "description": "<p>电话</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>内容</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "image",
            "description": "<p>图片</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "view_count",
            "description": "<p>浏览量</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>发布时间</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取供应列表成功\",\n    \"data\": {\n        \"id\": 1,\n        \"nickName\": 行走的唐僧肉,\n        \"avatarUrl\": https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKqKTSTcsjLwNib8FnKXOict3d055d8YxMvRz1k5jP6jgvI5hDeibKhN8S,\n        \"num\": 15034889912,\n        \"content\": 这个世界不是因为你能做什么，而是你该做什么,\n        \"image\": 20180328172856829.jpg,20180328172856829.jpg,20180328172856829.jpg,\n        \"view_count\": 1\n        \"created_at\": 2018-04-16 13:40:30\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"请求失败\",\n    \"data\": false \n    \n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/DiscoverListController.php",
    "groupTitle": "Discover"
  },
  {
    "type": "get",
    "url": "/discover/reply/37fb591be38db52dd1d5f04b689008f6?uid=openid&d_id=1&content=内容",
    "title": "发布评论",
    "version": "0.0.1",
    "name": "Discover_Reply",
    "group": "Discover",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "d_id",
            "description": "<p>供应id</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>内容</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"评论成功！\",\n    \"data\": true\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求！\",\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/DiscoverReplyController.php",
    "groupTitle": "Discover"
  },
  {
    "type": "get",
    "url": "/my/certification/business_license/message/37fb591be38db52dd1d5f04b689008f6?uid=openid",
    "title": "认证-消息状态",
    "version": "0.0.1",
    "name": "My_Certification_Business_License_Message",
    "group": "Discover",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "count",
            "description": "<p>消息数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "certification",
            "description": "<p>认证数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{  \n    \"meta\": {\n        \"status_code\": 200,\n        \"message\": \"请求成功！\"\n        \"data\": {\n            \"count\":1,\n            \"certification\":1,\n        }\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求！\"\n    \n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/DiscoverListController.php",
    "groupTitle": "Discover"
  },
  {
    "type": "get",
    "url": "/my/certification/licensee/status/37fb591be38db52dd1d5f04b689008f6?uid=openid",
    "title": "补全信息-状态",
    "version": "0.0.1",
    "name": "My_Certification_License_Status",
    "group": "Discover",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "count",
            "description": "<p>消息数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "certification",
            "description": "<p>认证数</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"请求成功！\",\n    \"data\": \"201806290706.png\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"暂无数据\",\n    \"data\": false\n    \n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/CertificationController.php",
    "groupTitle": "Discover"
  },
  {
    "type": "get",
    "url": "/my/discover/index/37fb591be38db52dd1d5f04b689008f6?uid=openid",
    "title": "我的发布",
    "version": "0.0.1",
    "name": "My_Discover_Index",
    "group": "Discover",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>供应id</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "num",
            "description": "<p>供应者电话</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>供应的内容</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "image",
            "description": "<p>供应的图片</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "view_count",
            "description": "<p>供应的浏览量</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "created_at",
            "description": "<p>供应的发布时间</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取我的发布列表成功\",\n    \"data\": {\n        \"id\": 1,\n        \"num\": 15034889912,\n        \"content\": 这个世界不是因为你能做什么，而是你该做什么,\n        \"image\": 20180328172856829.jpg,20180328172856829.jpg,20180328172856829.jpg,\n        \"view_count\": 185\n        \"created_at\": 2018-04-17 13:54:02\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/DiscoverListController.php",
    "groupTitle": "Discover"
  },
  {
    "type": "get",
    "url": "/my/discover/reply/37fb591be38db52dd1d5f04b689008f6?uid=openid",
    "title": "消息列表",
    "version": "0.0.1",
    "name": "My_Discover_Reply",
    "group": "Discover",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "d_content",
            "description": "<p>供应的内容</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "d_view_count",
            "description": "<p>供应的浏览量</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>评论id</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "d_id",
            "description": "<p>供应id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "dr_content",
            "description": "<p>评论的内容</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "is_read",
            "description": "<p>标记：0未读 1已读</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取未读消息列表成功\",\n    \"data\": {\n        \"d_content\": 我是供应内容,\n        \"d_view_count\": 179,\n        \"id\": 5,\n        \"d_id\": 3,\n        \"dr_content\": 我是评论内容,\n        \"is_read\": 0\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求！\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/DiscoverListController.php",
    "groupTitle": "Discover"
  },
  {
    "type": "get",
    "url": "/my/discover/reply/read/37fb591be38db52dd1d5f04b689008f6?uid=openid&id=1",
    "title": "标记已读",
    "version": "0.0.1",
    "name": "My_Discover_Reply_Read",
    "group": "Discover",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>评论id</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"data\": {\n        \"status_code\": 200,\n        \"message\": \"标记成功\"\n        \"data\": 1\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求！\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/DiscoverListController.php",
    "groupTitle": "Discover"
  },
  {
    "type": "get",
    "url": "/reply/list/37fb591be38db52dd1d5f04b689008f6?uid=openid&id=1",
    "title": "供应的详情",
    "version": "0.0.1",
    "name": "Reply_List",
    "group": "Discover",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>供应id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>供应id</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "num",
            "description": "<p>供应者电话</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "d_content",
            "description": "<p>供应的内容</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "image",
            "description": "<p>供应的图片</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "view_count",
            "description": "<p>供应的浏览量</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "d_create_at",
            "description": "<p>供应的发布时间</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "nickName",
            "description": "<p>评论者昵称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "avatarUrl",
            "description": "<p>评论者头像</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "dr_content",
            "description": "<p>评论者回复的内容</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "dr_create_at",
            "description": "<p>评论者回复的时间</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取评论列表成功\",\n    \"data\": {\n        \"id\": 1,\n        \"num\": 15034889912,\n        \"d_content\": 这个世界不是因为你能做什么，而是你该做什么,\n        \"image\": 20180328172856829.jpg,20180328172856829.jpg,20180328172856829.jpg,\n        \"view_count\": 185\n        \"d_create_at\": 2018-04-17 13:54:02\n        \"nickName\": 行走的唐僧肉,\n        \"avatarUrl\": https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKqKTSTcsjLwNib8FnKXOict3d055d8YxMvRz1k5jP6jgvI5hDeibKhN8S,\n        \"dr_content\": 第一个回复供应的人\n        \"dr_created_at\": 2018-04-17 17:24:59\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求！\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/DiscoverListController.php",
    "groupTitle": "Discover"
  },
  {
    "type": "get",
    "url": "/focus/index/37fb591be38db52dd1d5f04b689008f6",
    "title": "轮播列表",
    "version": "0.0.1",
    "name": "Focus_Index",
    "group": "Index",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "image",
            "description": "<p>图片名称</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取轮播列表成功\",\n    \"data\":\"20180328172856829.jpg\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"暂无数据！\",\n    \"data\": false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/FocusListController.php",
    "groupTitle": "Index"
  },
  {
    "type": "get",
    "url": "/offer/index/37fb591be38db52dd1d5f04b689008f6",
    "title": "产品报价",
    "version": "0.0.1",
    "name": "Offer_Index",
    "group": "Index",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "image",
            "description": "<p>图片名称</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取产品报价！\",\n    \"data\": {\n        \"path\": \"20180611090959.jpg\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"暂无数据！\",\n    \"data\": false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/OfferController.php",
    "groupTitle": "Index"
  },
  {
    "type": "get",
    "url": "/logistics/dynamic/37fb591be38db52dd1d5f04b689008f6",
    "title": "物流动态",
    "version": "0.0.1",
    "name": "Logistics_Dynamic",
    "group": "Logistics",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "nickName",
            "description": "<p>用户昵称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "shop_name",
            "description": "<p>货物名称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "weight",
            "description": "<p>货物重量</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "delivery_address",
            "description": "<p>装货地址</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "shipping_address",
            "description": "<p>卸货地址</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "updated_at",
            "description": "<p>发货时间</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取物流动态成功！\",\n    \"data\": {\n        \"nickName\": \"MEATHOME\",\n        \"shop_name\": \"白条羊\",\n        \"weight\": \"10吨\",\n        \"delivery_address\": \"锡林浩特市\",\n        \"shipping_address\": \"呼和浩特市\",\n        \"updated_at\": \"2018-06-08 15:48:20\",\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"暂无数据！\",\n    \"data\": false\n    \n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/LogisticsDynamicController.php",
    "groupTitle": "Logistics"
  },
  {
    "type": "post",
    "url": "/logistics/placeorder/37fb591be38db52dd1d5f04b689008f6",
    "title": "快速下单",
    "version": "0.0.1",
    "name": "Logistics_Placeorder",
    "group": "Logistics",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "nickName",
            "description": "<p>用户昵称</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "avatarUrl",
            "description": "<p>用户头像</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "shop_name",
            "description": "<p>货物名称</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "weight",
            "description": "<p>货物重量</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "delivery_address",
            "description": "<p>装货地址</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "shipping_address",
            "description": "<p>收获地址</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>用户Openid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "nickName",
            "description": "<p>用户昵称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "avatarUrl",
            "description": "<p>用户头像</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "shop_name",
            "description": "<p>货物名称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "weight",
            "description": "<p>货物重量</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "delivery_address",
            "description": "<p>装货地址</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "shipping_address",
            "description": "<p>收获地址</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>发货时间</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>自增id</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"下单成功\",\n    \"data\": {\n        \"nickName\": \"行走的唐僧肉\",\n        \"avatarUrl\": \"https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLLOciaCYd6icgToxbc42UicicZZ1icksBFDWlrmErQjUIicicIfR8tLN8PPK7mEiakVDhmd0lxYJ6vq3yXwQ/132\",\n        \"shop_name\": \"白条羊\",\n        \"weight\": \"10吨\",\n        \"delivery_address\": \"锡林浩特市\",\n        \"shipping_address\": \"呼和浩特市\",\n        \"created_at\": \"2018-06-08 16:39:13\"\n        \"id\": 1\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求！\"\n    \n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/LogisticsPlaceOrderController.php",
    "groupTitle": "Logistics"
  },
  {
    "type": "get",
    "url": "/my/msg/list/37fb591be38db52dd1d5f04b689008f6",
    "title": "站内信",
    "version": "0.0.1",
    "name": "My_Msg_List",
    "group": "Msg",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "total",
            "description": "<p>总条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "per_page",
            "description": "<p>每页条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "current_page",
            "description": "<p>当前页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "last_page",
            "description": "<p>总页数</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "next_page_url",
            "description": "<p>下一页</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "prev_page_url",
            "description": "<p>上一页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "from",
            "description": "<p>从</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "to",
            "description": "<p>至</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>自增id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>用户openid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "nickName",
            "description": "<p>用户昵称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "title",
            "description": "<p>标题</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "content",
            "description": "<p>内容</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "is_read",
            "description": "<p>是否已读：0未读 1已读</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>发送时间</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "updated_at",
            "description": "<p>更新时间</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": {\n        \"total\": 1,\n        \"per_page\": 5,\n        \"current_page\": 1,\n        \"last_page\": 1,\n        \"next_page_url\": null,\n        \"prev_page_url\": null,\n        \"from\": 1,\n        \"to\": 1,\n        \"data\": [\n            {\n               \"id\": 1,\n               \"openid\": \"5Pywdvujkesyuq3U0SadDKeJOYtd\",\n               \"nickName\": \"k1WQR@163.com\",\n               \"title\": \"肉之家小程序上线啦\",\n               \"content\": \"肉之家小程序V1.0.0.1版本即将上线！\",\n               \"is_read\": 0,\n               \"created_at\": \"2018-06-14 17:09:39\",\n               \"updated_at\": \"2018-06-14 17:09:39\"\n            }\n     }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"暂无数据！\",\n    \"article\": false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/MsgListController.php",
    "groupTitle": "Msg"
  },
  {
    "type": "get",
    "url": "/product/collect/37fb591be38db52dd1d5f04b689008f6?uid=openid&product_id=1",
    "title": "收藏产品",
    "version": "0.0.1",
    "name": "Product_Collect",
    "group": "Product",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "product_id",
            "description": "<p>产品id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "product_id",
            "description": "<p>产品id</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>收藏时间</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "updated_at",
            "description": "<p>更新时间</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>收藏自增id</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"收藏成功！\",\n    \"ProductCollect\": {\n        \"uid\": odzwM5Ma7Hbei5bQWgaB_LTwFn1Y,\n        \"product_id\": 1,\n        \"created_at\": 2018-04-16 17:38:35,\n        \"updated_at\": 2018-04-16 17:38:35,\n        \"id\": 1\n    },\n    \"meta\": {\n        \"status_code\": 200,\n        \"msg\": \"已经收藏过了！\",\n        \"data\": [\n            {\n                \"id\":1\n            }\n        ]\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求\"\n    \n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ProductListController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/product/collect/cancel/37fb591be38db52dd1d5f04b689008f6?uid=openid&collect_id=1",
    "title": "取消收藏",
    "version": "0.0.1",
    "name": "Product_Collect_Cancel",
    "group": "Product",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "collect_id",
            "description": "<p>产品收藏id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "collect_id",
            "description": "<p>产品收藏id</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"请求成功！\",\n    \"data\":true;\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求\",\n    \n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ProductListController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/product/collect/list/37fb591be38db52dd1d5f04b689008f6?uid=openid",
    "title": "产品收藏列表",
    "version": "0.0.1",
    "name": "Product_Collect_List",
    "group": "Product",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "product_id",
            "description": "<p>产品id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "thumb",
            "description": "<p>产品logo</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>产品名称</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "species",
            "description": "<p>产品种类</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "level",
            "description": "<p>产品等级(1:普通 2：绿色 3：有机 4:无公害 5：原生态)</p>"
          },
          {
            "group": "Success 200",
            "type": "Decimal",
            "optional": false,
            "field": "price",
            "description": "<p>产品价格</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "specifications",
            "description": "<p>产品规格(1：件 2：袋 3：条 4：盒 5：箱 6：块 7：个 8：吨 9：卷 10：斤 11：公斤 12：g 13：kg)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "describe",
            "description": "<p>产品描述</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Country_of_origin",
            "description": "<p>原产地</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>收藏id</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"请求成功！\",\n    \"CollectList\": {\n        \"product_id\": 1,\n        \"thumb\": /backend/uploads/20180329/20180329094349617.jpg,\n        \"name\": 羔羊方砖,\n        \"species\": 1,\n        \"level\": 1,\n        \"price\": 600.00,\n        \"specifications\": 1,\n        \"describe\": 羔羊方砖的描述内容,\n        \"Country_of_origin\": 内蒙古巴彦淖尔国家级经济技术开发区,\n        \"id\": 1,\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求\",\n    \n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ProductListController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/product/detail/37fb591be38db52dd1d5f04b689008f6?uid=openid&product_id=1&brand_id=1",
    "title": "产品详情",
    "version": "0.0.1",
    "name": "Product_Detail",
    "group": "Product",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "product_id",
            "description": "<p>产品id</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "brand_id",
            "description": "<p>品牌id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>产品自增id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "thumb",
            "description": "<p>产品缩略图</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>产品名称</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "brand_id",
            "description": "<p>品牌id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "brand_name",
            "description": "<p>品牌名称</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "species",
            "description": "<p>种类:1其他、2羊、3牛、4驼、5猪、6鸡、7鸭、8鹅、9鱼、10驴、11马</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "status",
            "description": "<p>状态 1：开启 2关闭 产品下架功能</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "recommended",
            "description": "<p>推荐状态 1：推荐 2否</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "level",
            "description": "<p>等级 1:普通 2：绿色 3：有机 4:无公害 5：原生态</p>"
          },
          {
            "group": "Success 200",
            "type": "Decimal",
            "optional": false,
            "field": "price",
            "description": "<p>价格</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "specifications",
            "description": "<p>规格 1：件 2：袋 3：条 4：盒 5：箱 6：块 7：个 8：吨 9：卷 10：斤 11：公斤 12：g 13：kg</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "describe",
            "description": "<p>产品描述</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "net_weight",
            "description": "<p>净含量</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "atlas1",
            "description": "<p>产品图集1</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "atlas2",
            "description": "<p>产品图集2</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "atlas3",
            "description": "<p>产品图集3</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "atlas4",
            "description": "<p>产品图集4</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Country_of_origin",
            "description": "<p>产品原产地</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "cold",
            "description": "<p>运送方式：1冷链、0无</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "empty",
            "description": "<p>运送方式：2空运、0无</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "courier",
            "description": "<p>运送方式3：快递、0无</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Shipping_agency",
            "description": "<p>运送机构</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "Selling_way",
            "description": "<p>售卖方式：1零售、2批发</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "halal",
            "description": "<p>是否清真：1是、2否</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "varieties",
            "description": "<p>品种</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Shelf_life",
            "description": "<p>保质期</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Storage_wap",
            "description": "<p>储藏方式</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "temperature",
            "description": "<p>储藏温度</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "warehouse_address",
            "description": "<p>仓库地址</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Production_license_number",
            "description": "<p>生产许可证编号</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Prodution_standard_no",
            "description": "<p>生产标准号</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "view_count",
            "description": "<p>浏览量</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>添加时间</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "updated_at",
            "description": "<p>更新时间</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "store_id",
            "description": "<p>店铺id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "store_name",
            "description": "<p>店铺名称</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "store_type",
            "description": "<p>店铺类型 1直营店、2专营店、3综合店、4代理商</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "store_phone",
            "description": "<p>店铺电话</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "store_address",
            "description": "<p>店铺地址</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "store_more1",
            "description": "<p>标签：售多地 0：无效 1：有效</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "store_more2",
            "description": "<p>标签：售本地 0：无效 1：有效</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"请求成功\",\n    \"product\": [\n         {\n             \"id\": 1,\n             \"thumb\": https://images.mongoliaci.com/backend/uploads/20180423/20180423142113585.jpg,\n             \"name\": 蒙高丽亚后腿切块,\n             \"brand_id\": 1,\n             \"brand_name\": 蒙高丽亚,\n             \"species\": 羊肉,\n             \"level\": 1,\n             \"price\": 78.00,\n             \"specifications\": 1,\n             \"describe\": 食于自然、忠于生活,\n             \"net_weight\": 4,\n             \"atlas1\": https://images.mongoliaci.com/backend/uploads/20180423/20180423142428235.jpg,\n             \"atlas2\": https://images.mongoliaci.com/backend/uploads/20180423/20180423142428235.jpg,\n             \"atlas3\": https://images.mongoliaci.com/backend/uploads/20180423/20180423142428235.jpg,\n             \"atlas4\": https://images.mongoliaci.com/backend/uploads/20180423/20180423142428235.jpg,\n             \"Country_of_origin\": 内蒙古新林浩特市,\n             \"cold\": 1,\n             \"empty\": 0,\n             \"courier\": 0,\n             \"Shipping_agency\": \"\",\n             \"Selling_way\": 1,\n             \"halal\": 1,\n             \"varieties\": 这是品种,\n             \"Shelf_life\": 12个月,\n             \"Storage_way\": 冷冻,\n             \"temperature\": -20℃\",\n             \"warehouse_address\": 这是仓库地址,\n             \"Production_license_number\": 生产许可证编号,\n             \"Production_standard_no\": 生产标准号,\n             \"view_count\": 100,\n             \"created_at\": 2018-04-23 14:25:21,\n             \"updated_at\": 2018-04-23 16:53:48,\n             \"logo\": \"https://assets.meathome.com.cn/FiXq1JJ0EA_OBfb67aZnf1T9WQ9I\",\n             \"enterprise\": \"锡林郭勒盟蒙高丽亚农牧业发展有限公司\"\n         }\n      ],\n      \"Store\":  [\n         {\n            \"store_id\": 1,\n            \"store_name\": 蒙高丽亚直营店\n            \"store_type\": 1\n            \"store_phone\": 400-8000-02\n            \"store_address\": 店铺地址\n            \"store_more1\": 1\n            \"store_more2\": 1\n         }\n      ],\n      \"status\": {\n           \"status\": 0\n      }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"暂无数据\",\n    \"product\":false,\n    \"store\":false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ProductListController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/product/index/37fb591be38db52dd1d5f04b689008f6",
    "title": "【首页】推荐产品",
    "version": "0.0.1",
    "name": "Product_Index",
    "group": "Product",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>产品id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>产品名称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "brand_name",
            "description": "<p>所属品牌</p>"
          },
          {
            "group": "Success 200",
            "type": "Decimal",
            "optional": false,
            "field": "price",
            "description": "<p>产品报价</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取产品成功！\",\n    \"data\": {\n        \"id\": 1,\n        \"name\": 蒙高丽亚后腿切块,\n        \"brand_name\": 蒙高丽亚,\n        \"price\": 78.00\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"message\": \"暂无数据！\",\n    \"status_code\": 404\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ProductListController.php",
    "groupTitle": "Product"
  },
  {
    "type": "post",
    "url": "/product/list/37fb591be38db52dd1d5f04b689008f6?name=羊肉&brand_name=蒙高丽亚&species=1&level=1",
    "title": "【首页】搜索产品",
    "version": "0.0.1",
    "name": "Product_List",
    "group": "Product",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>产品名称</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "brand_name",
            "description": "<p>品牌名称</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "species",
            "description": "<p>种类:1其他、2羊、3牛、4驼、5猪、6鸡、7鸭、8鹅、9鱼、10驴、11马</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "level",
            "description": "<p>等级 1:普通 2：绿色 3：有机 4:无公害 5：原生态</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>产品名称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "brand_name",
            "description": "<p>品牌名称</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "species",
            "description": "<p>种类:1其他、2羊、3牛、4驼、5猪、6鸡、7鸭、8鹅、9鱼、10驴、11马</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "level",
            "description": "<p>等级 1:普通 2：绿色 3：有机 4:无公害 5：原生态</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"获取产品成功！\",\n    \"data\": [\n       {\n          \"id\": 329,\n          \"thumb\": \"https://assets.meathome.com.cn/FjzWEE5FK4yJo3scnYu-0XeoUHLY\",\n          \"name\": \"羊肉卷\",\n          \"brand_name\": \"九月花\",\n          \"specifications\": 1,\n          \"price\": \"38.00\",\n          \"net_weight\": \"0.5\",\n          \"view_count\": 0\n        },\n    ]\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"未找到产品！\",\n    \"data\": false\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ProductListController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/products/list/37fb591be38db52dd1d5f04b689008f6?brand1=1&brand2=2&brand3=3",
    "title": "【找肉】全部产品",
    "version": "0.0.1",
    "name": "Products_List",
    "group": "Product",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "brand1",
            "description": "<p>品牌id</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "brand2",
            "description": "<p>品牌id</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "brand3",
            "description": "<p>品牌id</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "species",
            "description": "<p>种类:1其他、2羊、3牛、4驼、5猪、6鸡、7鸭、8鹅、9鱼、10驴、11马</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "recommended",
            "description": "<p>推荐状态 1：推荐 2否</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "level",
            "description": "<p>等级 1:普通 2：绿色 3：有机 4:无公害 5：原生态</p>"
          },
          {
            "group": "params",
            "type": "Decimal",
            "optional": false,
            "field": "price",
            "description": "<p>价格</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "Selling_way",
            "description": "<p>售卖方式：1零售、2批发</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "total",
            "description": "<p>总条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "per_page",
            "description": "<p>每页条数</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "current_page",
            "description": "<p>当前页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "last_page",
            "description": "<p>总页数</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "next_page_url",
            "description": "<p>下一页</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "prev_page_url",
            "description": "<p>上一页</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "from",
            "description": "<p>从</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "to",
            "description": "<p>至</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>产品id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "thumb",
            "description": "<p>缩略图</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>产品名</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "brand_name",
            "description": "<p>品牌名</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "price",
            "description": "<p>价格</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "specifications",
            "description": "<p>规格 1：件 2：袋 3：条 4：盒 5：箱 6：块 7：个 8：吨 9：卷 10：斤 11：公斤 12：g 13：kg</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "view_count",
            "description": "<p>浏览量</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "net_weight",
            "description": "<p>净含量</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "logo",
            "description": "<p>品牌Logo</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "sort",
            "description": "<p>按字母排序</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n  {\n      \"status_code\": 200,\n      \"msg\": \"请求成功！\",\n      \"products\": {\n          \"total\": 327,\n          \"per_page\": 10,\n          \"current_page\": 1,\n          \"last_page\": 33,\n          \"next_page_url\": \"http://api.meathome.com.cn/api/products/list/37fb591be38db52dd1d5f04b689008f6?page=2\",\n          \"prev_page_url\": \"http://api.meathome.com.cn/api/products/list/37fb591be38db52dd1d5f04b689008f6?page=1\",\n          \"from\": 11,\n          \"to\": 20,\n          \"data\":[\n              {\n                  \"id\": 1,\n                  \"thumb\": https://images.mongoliaci.com/backend/uploads/20180423/20180423142113585.jpg,\n                  \"name\": 蒙高丽亚后腿切块,\n                  \"brand_name\": 蒙高丽亚,\n                  \"price\": \"26.00\",\n                  \"specifications\": 1,\n                  \"view_count\": 0,\n                  \"net_weight\": \"0.5\"\n              }\n          ]\n      },\n      \"sort\":{\n\t\t\t \"id\": 1,\n\t\t\t \"logo\": https://images.mongoliaci.com/backend/uploads/20180423/20180423135321575.jpg,\n\t\t\t \"name\": 蒙高丽亚,\n\t\t\t \"sort\": M,\n\t     }\n  }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 404,\n    \"msg\": \"暂无数据！\",\n    \n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/ProductListController.php",
    "groupTitle": "Product"
  },
  {
    "type": "get",
    "url": "/mobile/verify/code/37fb591be38db52dd1d5f04b689008f6?uid=openid&mobile=15034889912&code=code",
    "title": "短信验证",
    "version": "0.0.1",
    "name": "Mobile_Verify_Code",
    "group": "SendCode",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "mobile",
            "description": "<p>用户手机号</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "agent",
            "description": "<p>代销达人：0否1是</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "Catering_customer",
            "description": "<p>餐饮客户：0否1是</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "Corporate_client",
            "description": "<p>企业客户：0否1是</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "Share_talent",
            "description": "<p>分享达人：0否1是</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "Production_service",
            "description": "<p>生产服务：0否1是</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "Brand",
            "description": "<p>品牌厂商：0否1是</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "Cold_chain_logistic",
            "description": "<p>冷链物流：0否1是</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"验证成功！\",\n    \"data\": {\n        \"status\": true,\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求！\",\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/CertificationController.php",
    "groupTitle": "SendCode"
  },
  {
    "type": "get",
    "url": "/send/mobile/code/37fb591be38db52dd1d5f04b689008f6?uid=openid&mobile=15034889912",
    "title": "获取验证码",
    "version": "0.0.1",
    "name": "Send_Mobile_Code",
    "group": "SendCode",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "uid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "params",
            "type": "Int",
            "optional": false,
            "field": "mobile",
            "description": "<p>用户手机号</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"发送验证码成功！\",\n    \"data\": {\n        \"status\": true,\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求！\",\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/CertificationController.php",
    "groupTitle": "SendCode"
  },
  {
    "type": "get",
    "url": "/wechat/info/37fb591be38db52dd1d5f04b689008f6",
    "title": "授权登陆",
    "version": "0.0.1",
    "name": "Wechat_Info",
    "group": "Wechat",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>微信用户openid</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "nickName",
            "description": "<p>用户昵称</p>"
          },
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "avatarUrl",
            "description": "<p>用户头像</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>供应id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "nickName",
            "description": "<p>用户昵称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "avatarUrl",
            "description": "<p>用户头像</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"登陆成功！\",\n    \"data\": {\n        \"nickName\": 行走的唐僧肉,\n        \"avatarUrl\": https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKqKTSTcsjLwNib8FnKXOict3d055d8YxMvRz1k5jP6jgvI5hDeibKhN8S,\n    }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求！\"  \n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/WechatController.php",
    "groupTitle": "Wechat"
  },
  {
    "type": "get",
    "url": "/wechat/key/37fb591be38db52dd1d5f04b689008f6",
    "title": "获取SessionKey",
    "version": "0.0.1",
    "name": "Wechat_Key",
    "group": "Wechat",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "code",
            "description": "<p>微信票据code</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>供应id</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "session_key",
            "description": "<p>微信key</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "openid",
            "description": "<p>用户openid</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功响应:",
          "content": "\n{\n    \"status_code\": 200,\n    \"msg\": \"请求成功！\",\n    \"session_key\": null,\n    \"openid\": null\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败响应:",
          "content": "{\n    \"status_code\": 403,\n    \"msg\": \"非法请求！\"  \n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1/WechatController.php",
    "groupTitle": "Wechat"
  }
] });
