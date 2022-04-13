Program L_3_7;
var A,B,R:integer;
Procedure poriv (a,b:integer;var r:integer);
var x:integer;
begin
if a<>b then if a>b then r:=a
                    else r:=b
         else r:=0;
end;
begin
read (a,b);
poriv (a,b,r);
write (r);
end.