 function nod(var a, b: longint): longint; 
  begin
   if (a = 0) or (b = 0) then
     if a = 0 then
       nod:= b
     else 
       nod:= a
   else 
     if a >= b then 
       nod:= nod( a mod b, b)
     else 
       nod:= nod( a, b mod a)
  end;
var n,m,f:longint;
begin
read(n,m);
f:=nod(n,m);
writeln(f);
end.