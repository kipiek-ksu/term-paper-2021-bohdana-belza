program K10_z12;
type student = record
surname:string;
name:string;
first_name:string;
street:string;
house: integer;
flat:integer;
end;
var street:string; n,i:integer; a:student;
begin
readln(street);
readln(n);
for i:=1 to n do
begin