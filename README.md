#IMS - Imperial Management System

##By Jan Kostecki 2017

System created to improve school's book sale, work as extension of [Egielda](github.com/m4tx/egielda)

For full compability of programs, in egielda in file orders/templates/orders/fulfill_accept.html exchange line 20 with:

```
<button onclick="window.open('/IMS/newTask.php?id={{ order.pk }}');" class="ui primary icon labeled button right floated" type="submit">
```

##Built with:
*PHP
*HTML5
*JavaScript
*[JQuery](jquery.com)
*MySQLi
