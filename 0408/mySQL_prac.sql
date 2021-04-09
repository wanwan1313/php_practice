
-- 合併兩個資料表
SELECT * FROM `products` JOIN `categories` ON `products`.`category_sid` = `categories`.`sid`
-- on代表設定條件


-- 合併兩個資料表:限定欄位
SELECT `products`.* ,`categories`.`name` FROM `products` JOIN `categories` ON `products`.`category_sid` = `categories`.`sid`

-- 合併兩個資料表:變數寫法
SELECT p.* , c.`name` FROM `products` AS p JOIN `categories` AS c ON p.`category_sid` = c.`sid`

-- 合併兩個資料表:限定欄位+改變顯示欄位的名稱 -> 把name變成分類
SELECT p.* , c.`name` AS `分類` FROM `products` AS p JOIN `categories` AS c ON p.`category_sid` = c.`sid`
-- AS皆可省略


-- 合併三個資料表
SELECT o.*, d.`product_sid`, d.`price`, d.`quantity`, p.`bookname` FROM `orders` o 
    JOIN `order_details` d 
    ON o.`sid` = d.`order_sid`
    JOIN `products` p
    on d.`product_sid` = p.`sid`
    WHERE o.`sid` = 4


-- 資料表排序
SELECT * FROM `products` ORDER BY `category_sid` DESC, `sid` DESC
-- 先排序分類sid，若分類一樣，再排序產品sid
-- ASC:由小到大(預設), DESC:由大到小


-- 當合併查詢資料表有對不上的時候:使用LEFT JOIN，對不上的就會呈現空值NULL
SELECT * FROM `products` p LEFT JOIN `categories` c ON p.`category_sid` = c.`sid`

-- 當合併查詢資料表有NULL
SELECT * FROM  `products`p LEFT JOIN `categories` c ON p.`category_sid` = c.`sid` WHERE c.`sid` IS NULL
SELECT * FROM  `products`p LEFT JOIN `categories` c ON p.`category_sid` = c.`sid` WHERE c.`sid` IS NOT NULL

-- 模糊查詢
SELECT * FROM `products` WHERE `author` LIKE '陳%'
-- 陳%:第一個字為陳
SELECT * FROM `products` WHERE `author` LIKE '%陳%'
-- %陳%:字串中有任一字為陳

-- 查詢寫法:查詢`欄位` LIKE `使用者輸入的字串` OR `欄位` LIKE `使用者輸入的字串`
-- 可以查詢多個欄位，但必須考慮到效能問題
SELECT * FROM `products` WHERE `author`LIKE '%計%' OR `bookname` LIKE '%計%'


-- NULL用IS
-- INT 用 =,>,<, !=等等
SELECT * FROM `products` WHERE `sid`>=3 AND `sid`<=20
-- 中文 用 LIKE

-- 查詢限定範圍的資料WHERE-IN
SELECT * FROM `products` WHERE `sid` IN  (15 , 4 , 18 , 12) ORDER BY `sid` DESC
SELECT * FROM `products` WHERE `sid` IN (15 , 4 , 18 , 12) ORDER BY RAND()

-- 群組資料GROUP BY
SELECT p.`category_sid` AS '分類編號', COUNT(*) AS '數量', c.`name` AS '分類名稱' FROM `products` p 
JOIN `categories` c ON p.`category_sid` = c.`sid`
GROUP BY p.`category_sid`


-- LIMIT