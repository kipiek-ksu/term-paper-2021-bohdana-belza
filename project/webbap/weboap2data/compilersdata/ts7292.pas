Program a1;
Var n,i:integer;k,c:real;
Begin
Read(n);
k:=1;
For i:=1 to n do
k:=k*(1+1/sqr(i));
Write(k:10:3);
end.