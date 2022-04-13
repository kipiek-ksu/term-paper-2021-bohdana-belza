program tema2_15;
var a,b: integer;

function col(n,m: integer): integer;
 var sum: integer;
begin
 if ((m=0) and (n>0))or((m=n)and(n>=0)) then
 else
  col:=1+col(n-1,m-1)+col(n-1,m);
end;

begin
 read(a,b);
 write(col(a,b)+1);
end.
