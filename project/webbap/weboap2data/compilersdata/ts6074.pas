program sdgfdfg;
var A:array[1..100] of integer;
b,i,n,k:integer;
begin   clrscr;
k:=0;
repeat
k:=k+1;
until a[k]>0;
b:=A[k];
readln(n);
writeln(n);
for i:=1 to n  do readln(a[i]);
begin
If (a[i]>0) and (a[i]<b) then begin b:=a[i] end; 
writeln(b);
end.