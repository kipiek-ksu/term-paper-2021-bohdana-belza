program PRK337;
type mas=array[1..255] of integer;
var A,B,C,D:mas;
    n,m,k,i:integer;
  procedure chng(n,k:integer; X:mas;var Y:mas);
  var i:integer;
      t:boolean;
  begin
       t:=false;
        for i:=1 to n do
         y[i]:=x[i];
       for i:=1 to n do
         if x[i]=k then t:=false else t:=true;
       if t then
                begin
                    for i:=2 to n do
                     if x[1]>x[i] then t:=true else
                                       begin
                                            t:=false;
                                            break;
                                       end;
                end;
       if t then y[1]:=k;
   end;
begin
  read(n,m,k);
  for i:=1 to n do
    read(a[i]);
  for i:=1 to m do
    read(b[i]);
  chng(n,k,A,C);
  chng(m,k,B,D);
  for i:=1 to n do
    write(c[i],);
  for i:=1 to m do
    write(d[i],);
end.
