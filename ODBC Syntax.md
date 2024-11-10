# Basic ODBC Functions in PHP

Basic ODBC functions in PHP

1. **odbc_connect**
   - `odbc_connect($dsn, $user, $password);`
   - Establishes a connection to a data source.

2. **odbc_exec**
   - `odbc_exec($conn, $query);`
   - Executes an SQL statement.

3. **odbc_fetch_array**
   - `odbc_fetch_array($result);`
   - Fetches a result row as an associative array.

4. **odbc_fetch_row**
   - `odbc_fetch_row($result);`
   - Fetches a result row as a numeric array.

5. **odbc_result**
   - `odbc_result($result, $field);`
   - Retrieves a result data for a specific field.

6. **odbc_errormsg**
   - `odbc_errormsg();`
   - Returns the last error message.

7. **odbc_close**
   - `odbc_close($conn);`
   - Closes the ODBC connection.

8. **odbc_prepare**
   - `odbc_prepare($conn, $query);`
   - Prepares an SQL statement for execution.

9. **odbc_execute**
   - `odbc_execute($stmt, $params);`
   - Executes a prepared statement.

10. **odbc_free_result**
    - `odbc_free_result($result);`
    - Frees the resources associated with the result.
