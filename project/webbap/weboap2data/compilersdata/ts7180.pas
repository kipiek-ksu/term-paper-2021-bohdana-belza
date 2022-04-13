program K8_z1;
var two,f,t,n,q:integer;
procedure hanoi(one,two,three,n:byte);
begin
if n=1 then writeln(one,' ',three)
else begin
hanoi(one,three,two,n-1);
hanoi(one,two,three,1);
hanoi(two,one,three,n-1);
end;end;
begin
read(n,f,t);
if (f=1)and(t=2)or(t=1)and(f=2)then q:=3;
if (f=2)and(t=3)or(t=2)and(f=3)then q:=1;
if (f=3)and(t=1)or(t=3)and(f=1)then q:=2;
hanoi(f,q,t,n);
end.