rogram z1;

const p = 0.55;

type o=array [1..10]of real;

var a,b:o;

    n,m,z,f,k,i,j,g:integer;

    maxa,maxb:real;

function Imax(t:o;c:integer):integer;

  var i:integer;

  max:real;

begin

  max:=t[1];

  Imax:=1;

  for i:=2 to c do

    if max<t[i] then begin

     max:=t[i];

     Imax:=i;

    end;

end;

procedure zamina(var x:o;q,g:integer);

begin

  for i:=g+1 to q do

    x[i]:=p;

  end;

begin

 read(n,m);

 for i:=1 to n do

  read(a[i]);

 for j:=1 to m do

  read(b[j]);

 f:=Imax(a,n);

 g:=Imax(b,m);

 zamina(a,n,f);

 zamina(b,m,g);

 for i:=1 to n do

  write(A[i]:0:2,' ');

 writeln;

 for j:=1 to m do

  write(b[j]:0:2,' ');

end.