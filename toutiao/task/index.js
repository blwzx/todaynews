const request = require('request');
const cheerio = require('cheerio');
const iconv = require('iconv-lite'); /*编码转换*/
const async = require('async');  /*异步传输*/
const mysql = require('mysql'); /*连接数据库*/
       const connection = mysql.createConnection({
    host: '127.0.0.1',
    user: 'root',
    password: '',
    database: 'new'
});
const filter= require('bloom-filter-x');
function fetch_news(){
    request( {
        url:"http://news.zol.com.cn/",
        encoding:null,
    },(err,res,body)=>{
        body = iconv.decode(body,'gb2312');
        let $ = cheerio.load(body);
        let titles = [];
        let urls = [];
        let images = [];
        var connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : '',
    database : 'new'
});
let select_sql = 'select * from news';
connection.query(select_sql,  (err, results, fields) => {
    if (err) throw err;
    console.log(results);
})  
        $('.content-list li').each((k,v)=>{
            let cid = 1;
            let url = $(v).find('a').first().attr('href');
            let title = $(v).find('.info-head').find('a').text();
            let image = $(v).find('img').attr('.src');
            let dsc = $('.content-list-item p').text();
            let create_time = $(v).find('.foot-date').text();
            if( filter.add(url) ){
let insert_sql = 'insert into news (cid,title,dsc,image,url,create_time) value (?,?,?,?,?,?)';
connection.query(insert_sql, [cid,title,dsc,image,url,create_time], (err, results, fields) => {
    if (err) throw err;
    console.log(results.insertId);
})
            }
        });
        console.log(titles)
        console.log(images)
        if (!urls.length) {
            let d = new Date();
            console.log(d.toUTCString() + '抓取了一次，本次没有更新..')
        } else {
            let d = new Date();
            console.log(d.toUTCString() + '抓取了一次，本次更新了' + urls.length + '条');
            async.eachLimit(urls,1,(v,next)=>{
                request({
                    url: v
                },(err,res,body)=>{
                    console.log(v);
                    next(null);
                })
            })
        }
    })
}
fetch_news();




