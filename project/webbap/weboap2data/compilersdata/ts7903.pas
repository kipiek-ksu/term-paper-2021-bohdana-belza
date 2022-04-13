program p4;
var a,b,o,p:integer;
begin
read(a,b);
if (a<b)and(b mod a=0) then o:=5*a
                       else begin o:=a; p:=b;end;
write(o,' ',b);
end.