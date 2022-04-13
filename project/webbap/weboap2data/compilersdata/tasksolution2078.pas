program ins;
type mas=array [1..300] of char;
var count,S,P:integer;
    m:mas;
procedure outmas(var a:mas;k:integer);
var i:integer;
begin
  for i:=1 to k-1 do
    write(a[i],' ');
  writeln(a[k]);
end;
procedure inserts(var A:mas;n:integer);
var k,l,r,i,j:integer;
    b:char;
begin
  P:=0;
  S:=0;
  for k:=1 to n-1 do begin
    b:=a[k+1];
    s:=s+1;
    if b<a[k]
      then begin
        l:=1;
        r:=k;
        repeat
          j:=(l+r) div 2;
          if b<a[j]
            then r:=j
            else l:=j+1;
          S:=S+1;
        until l=j;
        for i:=k downto j do
          begin
            a[i+1]:=a[i];
          end;
        a[j]:=b;
        P:=P+1;
         outmas(a,n);
       end;
  end;
end;
procedure inpmas(var a:mas;k:integer);
var i:integer;
begin
 for i:=1 to k do
  read(a[i]);
end;
BEGIN
  readln(count);
  inpmas(m,count);
  inserts(m,count);
  writeln(S);
  writeln(P);
  outmas(m,count);
END.