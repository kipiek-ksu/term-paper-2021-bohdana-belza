Program pr28;
type Mas=array [1..200] of integer;
Var gnomes, animals, birds:Mas; n,m,k,i:integer; rezsum,rezmax:string;
 function maxx (a,b,c:integer):string;
           begin
           if (a>b)and(a>c) then
           maxx:='gnomes';
           if (b>a)and(b>c) then
           maxx:='animals';
           if (c>a)and(c>b) then
           maxx:='birds';
           end;

  procedure Kv(a,b,c:mas; koln,kolm,kolk:integer; Var sum,max :string);
        Var k:integer; sumn, summ, sumk, maxn, maxm, maxk:integer;
        begin
        Sumn:=0;
        Summ:=0;
        Sumk:=0;
        maxn:=a[1];
        maxm:=b[1];
        maxk:=c[1];
        for k:=1 to  koln do
        begin
            Sumn:=sumn+a[k];
            if a[k+1]> maxn then
            maxn:=a[k+1];
        end;
        for k:=1 to  kolm do
        begin
            Summ:=summ+b[k];
            if b[k+1]> maxm then
            maxm:=b[k+1];
        end;
        for k:=1 to  kolk do
        begin
            Sumk:=sumk+c[k];
            if c[k+1]> maxk then
            maxk:=c[k+1];
        end;
        sum:=maxx(sumn,summ,sumk);
        max:=maxx(maxn,maxm,maxk);
    end;


begin
read(n);
for i:=1 to n do
read(gnomes[i]);
read(m);
for i:=1 to m do
read(animals[i]);
read(k);
for i:=1 to k do
read(birds[i]);
kv(gnomes,animals,birds,n,m,k,rezsum,rezmax);
writeln(rezsum);
writeln(rezmax);
end.