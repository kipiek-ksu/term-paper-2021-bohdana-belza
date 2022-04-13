ProGraM FindMinRec;
type mass=array [1..100] of integer;
var x:Mass;
n,i:integer;

function MinK(x:mass;k:integer):integer;
var y,R:integer;
begin
y:=x[k];
if k>1 then
begin
R:=MinK(x,k-1);
if y>R then y:=R
end;
MinK:=y;
end;

begin
readln(n);
for i:=1 to n do
begin
readln(x[i])
end;
writeln(MinK(x,n));
end.