## PhoneBooks

All requests are done using localhost


Add new PhoneBook
```
url: http://localhost/PhoneBooks/addNewPhoneBook
method: post
variables:
name:'yourName'
lastName:'Your LastName'
phone:'phone number'
type:'phoneType'
```



Get all phoneBooks
```
url: http://localhost/PhoneBooks/getPhoneBooks
method: Get
```
Update phoneBooks
```
url: http://localhost/PhoneBooks/update
method: post
variables:
searchBy: 'what property do you want to search'
value:'value of what are you searching'
update:'what property you want to update'
value_update:'value you want to give to the property'
```
Delete phoneBooks
```
url: http://localhost/PhoneBooks/delete
method: post
variables:
searchBy: 'what property do you want to search'
value:'value of the property you want to delete'
ps: get array where this data exist and delete all array.
```
Adapter pattern is used for read and write in different file formats

Only JsonAdapter is finished.

Dependency injection is used to inject adapters.